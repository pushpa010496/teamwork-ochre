<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
    
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        // return parent::render($request, $exception);


        if ($this->isHttpException($exception)) {
            switch ($exception->getStatusCode()) {

            // not authorized
                case '403':
                return \Response::view('errors.403',array(),403);
                break;

            // not found
                case '404':
              // return abort(404);
              //   break;
                return \Response::view('errors.404',array(),404);
              // return redirect()->route('404-page');
            // return redirect()->route('mainhome');

//return redirect(route('404-error'));     

                break;

            // internal error
                case '500':
                return \Response::view('errors.500',array(),500);
                break;

                default:
                  // return redirect()->route('woops');
                return $this->renderHttpException($exception);
                break;
            }
        }
        elseif ($exception instanceof \Illuminate\Session\TokenMismatchException) {

         return redirect()
         ->back()
         ->withInput($request->except(['password', 'password_confirmation']))
         ->with('error', 'The form has expired due to inactivity. Please try again');
     }
     else {
        return parent::render($request, $exception);
    }

    }
}
