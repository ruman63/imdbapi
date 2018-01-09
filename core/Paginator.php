<?php
namespace Core;

class Paginator
{
    private $dataset;
    public $total;

    public function __construct($dataset, $total)
    {
        $this->dataset = $dataset;
        $this->total = $total;
    }
    public function data()
    {
        return $this->dataset;
    }
    public function current()
    {
        return isset($_GET['page']) ? $_GET['page'] : 1;
    }
    public function totalPages()
    {
        return ceil($this->total/count($this->dataset));
    }
    public function hasPrevious()
    {
        return $this->current() > 1;
    }
    public function hasNext()
    {
        return $this->current() < $this->totalPages();
    }
    public function previousUrl()
    {
        $query = $_GET;
        $query['page'] = $this->current() - 1;
        return Request::current($query);
    }
    public function nextUrl()
    {
        $query = $_GET;
        $query['page'] = $this->current() + 1;
        return Request::current($query);
    }

    public function from()
    {
        return ($this->current()-1) * count($this->dataset) + 1;
    }

    public function to()
    {
        return $this->current() * count($this->dataset);
    }
}
