<?php


namespace App\Filters;


use Illuminate\Http\Request;

class CustomerFilter extends Filter
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['country', 'phoneState'];

    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function country()
    {
        dd("Asdas");
//        $this->builder->where('status', $status);
    }
}
