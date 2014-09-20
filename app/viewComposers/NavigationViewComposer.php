<?php

use Illuminate\Support\Collection;
use Illuminate\View\View;


class NavigationViewComposer {

  public function compose(View $view) {

    /*
    |------------------------------------------------------------------------
    | Define the main menu
    |------------------------------------------------------------------------
    | Each menu is a Collection
    */
    $menu = new Collection;

    /*
    |------------------------------------------------------------------------
    | Add the first link
    |------------------------------------------------------------------------
    | We push each menu entry onto the main menu in the order that we wish
    | for them to appear on the menu
    */
    $menu->push((object)['title' => 'Home', 'link' => URL::to('/')]);

    /*
    |------------------------------------------------------------------------
    | Define the first sub menu
    |------------------------------------------------------------------------
    | Each menu is a Collection, including sub menus
    | The sub menu only get's pushed onto the main menu after it has been
    | Completely defined.
    */
    $sub1 = new Collection;

    /*
    |------------------------------------------------------------------------
    | Add the links to the sub menu
    |------------------------------------------------------------------------
    | Sub menu items simply get pushed onto the sub menu collections instead
    | of the main menu collection. Clean isn't it?
    */
    $sub1->push((object)['title' => 'About me', 'link' => URL::route('test')]);
    $sub1->push((object)['title' => 'About the site', 'link' => URL::route('test')]);

    /*
    |------------------------------------------------------------------------
    | Push the sub menu onto the main menu
    |------------------------------------------------------------------------
    | Notice that this definition has the menu and the type key?
    */
    $menu->push((object)['title' => 'About', 'menu' => $sub1]);

    /*
    |------------------------------------------------------------------------
    | Continue adding links to the menu
    |------------------------------------------------------------------------
    | See, we just add the items in the order we want them to appear
    */
    $menu->push((object)['title' => 'Blog', 'link' => URL::route('test')]);
    $menu->push((object)['title' => 'User', 'link' => URL::route('test')]);

  /*
    |------------------------------------------------------------------------
    | Define the second sub menu
    |------------------------------------------------------------------------
    | Easy peasy, just like the first time
    */
    $sub2 = new Collection;

    /*
    |------------------------------------------------------------------------
    | Add a heading to this sub menu
    |------------------------------------------------------------------------
    | Collections can hold any data we need. We will be using twitter
    | bootstrap to build our menu, but our view composer doesn't need to know
    | that, it just needs to tell us that this entries type is a 'heading'
    */
    $sub2->push((object)['title' => 'Some links I find awesome', 'type' => 'heading']);

    /*
    |------------------------------------------------------------------------
    | Add the links to the sub menu
    |------------------------------------------------------------------------
    | Now we add our links like normal
    */
    $sub2->push((object)['title' => 'RTFM', 'link' => 'http://matthewhailwood.co.nz']);
    $sub2->push((object)['title' => 'Google', 'link' => 'http://google.com']);

    /*
    |------------------------------------------------------------------------
    | Add a divider to the sub menu
    |------------------------------------------------------------------------
    | Just like the heading the divider is just a custom type
    */
    $sub2->push((object)['type' => 'divider']);

    /*
    |------------------------------------------------------------------------
    | Add another link to the sub menu
    |------------------------------------------------------------------------
    */
    $sub2->push((object)['title' => 'Blog post 32', 'link' => URL::route('test')]);

    /*
    |------------------------------------------------------------------------
    | Push the sub menu onto the main menu
    |------------------------------------------------------------------------
    | Yep, just like the first time
    */
    $menu->push((object)['title' => 'Links', 'menu' => $sub2]);

    /*
    |------------------------------------------------------------------------
    | Save the menu as data for the view
    |------------------------------------------------------------------------
    | Any properties set on the $view variable will be available in our view
    | under that key.
    */
    $view->menu = $menu;

  }

}
