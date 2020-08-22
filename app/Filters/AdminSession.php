<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminSession implements FilterInterface
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if ($this->session->level != 'admin') {
            return redirect()->to('/');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
