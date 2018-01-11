<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // \Menu::makeOnce('MyNavBar', function ($menu) {
        // $menu->add('首页', ['class' => 'navbar navbar-home', 'route' => 'index']);
        // $xygk = $menu->add('学院概况', 'xygk');
        // $xygk->add('submenu', 'link address');
        // $xygk->add('submenu3', 'link address');
        // // $menu->add('学院概况', 'about')->add('leve2', 'link address')->add('leve4', 'link address');
        // $menu->add('About',    ['route'  => 'page.about']);
        // $menu->about->add('Who We are', 'who-we-are');
        // // $menu->about->add('Who we are', 'Who-we-are');
        // // $menu->get('学院概况')->add('what we do', 'what-we-do');
        // $menu->add('新闻公告', 'services');
        // $menu->add('招聘信息', 'contact');
        // $menu->add('就业指导', 'job');
        // });
        return $next($request);
    }
}
