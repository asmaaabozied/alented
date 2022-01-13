<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;

class localization
{
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->header('Accept-Language');
        // dd($locale);
        // if the header is missed
        if(!$locale || !\Request::is('api*')){
            // take the default local language
            $locale = \App::getLocale();
        }

        // dd($this->app->config);

        // check the languages defined is supported
        if (!array_key_exists($locale, $this->app->config->get('app.supported_languages'))) {
            // respond with error
            return abort(403, 'Language not supported.');
        }

        // set the local language
        $this->app->setLocale($locale);

        // $this->app->setFallback($locale);

        // get the response after the request is done
        $response = $next($request);

        // set Content Languages header in the response
        $response->headers->set('Accept-Language', $locale);

        // return the response
        return $response;
    }
}
