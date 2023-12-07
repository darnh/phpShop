<?php


/*
 * Pagination class for generating page navigation
 */

class Pagination
{

    /**
     *
     * @var Page navigation links
     *
     */
    private $max = 10;

    /**
     *
     * @var Key for GET, in which the page number is written.
     */
    private $index = 'page';

    /**
     *
     * @var Current page
     *
     */
    private $current_page;

    /**
     *
     * @var Total number of records
     *
     */
    private $total;

    /**
     *
     * @var Entries per page
     *
     */
    private $limit;

    /**
     * Running the necessary data for navigation
     * @param type $total <p>Total number of records</p>
     * @param type $currentPage <p>Current page number</p>
     * @param type $limit <p>Number of records per page</p>
     * @param type $index <p>Key for url</p>
     */
    public function __construct($total, $currentPage, $limit, $index)
    {
        # Set the total number of records
        $this->total = $total;

        # Set the number of records per page
        $this->limit = $limit;

        # Set the key in the url
        $this->index = $index;

        # Set the number of pages
        $this->amount = $this->amount();

        # Set the current page number
        $this->setCurrentPage($currentPage);
    }

    /**
     * To display links
     * @return HTML code with navigation links
     */
    public function get()
    {
        # To record references
        $links = null;

        # Get the constraints for the loop
        $limits = $this->limits();

        $html = '<ul class="pagination">';
        # Generate links
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            # If current is the current page, there is no link and the active class is added
            if ($page == $this->current_page) {
                $links .= '<li class="active"><a href="#">' . $page . '</a></li>';
            } else {
                # Otherwise we generate a link
                $links .= $this->generateHtml($page);
            }
        }

        # If links have been created
        if (!is_null($links)) {
            # If the current page is not the first page
            if ($this->current_page > 1)
                # Create a "To First" link
                $links = $this->generateHtml(1, '&lt;') . $links;

            # If the current page is not the first page
            if ($this->current_page < $this->amount)
                # Create a "To Last" link
                $links .= $this->generateHtml($this->amount, '&gt;');
        }

        $html .= $links . '</ul>';

        # return html
        return $html;
    }

    /**
     * To generate HTML code of the link
     * @param integer $page - page number
     *
     * @return
     */
    private function generateHtml($page, $text = null)
    {
        # If no link text is specified
        if (!$text)
            # Specify that the text is a page number
            $text = $page;

        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
        $currentURI = preg_replace('~/page-[0-9]+~', '', $currentURI);
        # Generate the HTML code of the link and return it
        return
            '<li><a href="' . $currentURI . $this->index . $page . '">' . $text . '</a></li>';
    }

    /**
     *   To get where to start from
     *
     * @return array with start and end of counting
     */
    private function limits()
    {
        # Calculate the links on the left (so that the active link is in the middle)
        $left = $this->current_page - round($this->max / 2);

        # Calculate the origin
        $start = $left > 0 ? $left : 1;

        # If there are at least $this->max pages ahead of you
        if ($start + $this->max <= $this->amount) {
            # Set the end of the loop forward to $this->max pages or just to the minimum
            $end = $start > 1 ? $start + $this->max : $this->max;
        } else {
            # End - total number of pages
            $end = $this->amount;

            # Start - minus $this->max from end
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }

        # return
        return
            array($start, $end);
    }

    /**
     * To set the current page
     *
     * @return
     */
    private function setCurrentPage($currentPage)
    {
        # Get the page number
        $this->current_page = $currentPage;

        # If the current page is greater than zero
        if ($this->current_page > 0) {
            # If the current page is less than the total number of pages
            if ($this->current_page > $this->amount)
                # Set the page to the last page
                $this->current_page = $this->amount;
        } else
            # Set page one
            $this->current_page = 1;
    }

    /**
     *To obtain the total number of pages
     *
     * @return number of pages
     */
    private function amount()
    {
        # Divide and return
        return ceil($this->total / $this->limit);
    }

}