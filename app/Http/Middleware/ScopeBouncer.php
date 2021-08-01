<?php

namespace App\Http\Middleware;

use Silber\Bouncer\Bouncer;
use Auth;
use Closure;

class ScopeBouncer
{
    /**
     * The Bouncer instance.
     *
     * @var \Silber\Bouncer\Bouncer
     */
    protected $bouncer;

    /**
     * Constructor.
     *
     * @param \Silber\Bouncer\Bouncer  $bouncer
     */
    public function __construct(Bouncer $bouncer)
    {
        $this->bouncer = $bouncer;
    }

    /**
     * Set the proper Bouncer scope for the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // print_r($request->url());
        // die;
        // Here you may use whatever mechanism you use in your app
        // to determine the current tenant. To demonstrate, the
        // $tenantId is set here from the user's account_id.
        $tenantId = Auth::id();//$request->user()->account_id;

        $this->bouncer->scope()->to($tenantId);

        return $next($request);
    }
}
