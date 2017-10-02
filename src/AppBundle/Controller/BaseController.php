<?php
/**
 * Created by PhpStorm.
 * User: eugene
 * Date: 02.10.17
 * Time: 3:46
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    protected function setResultSuccess(array $parameters = [])
    {
        $result = [
            'errorCode'  => 'OK',
            'value'      => '',
            'message'    => 'Success'
        ];

        $this->result = array_merge($result, $parameters);

        return $this->result;
    }

    /**
     * @param array $parameters
     * @return array
     */
    protected function setResultError(array $parameters = [])
    {
        $result = [
            'errorCode'  => 'error',
            'value'      => 'wrong',
            'message'    => 'Ошибка'
        ];

        $this->result = array_merge($result, $parameters);

        return $this->result;
    }
}