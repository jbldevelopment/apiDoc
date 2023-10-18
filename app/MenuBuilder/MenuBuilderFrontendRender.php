<?php

namespace App\MenuBuilder;


use App\Helpers\LanguageHelper;
use App\Menu;
use Illuminate\Support\Pluralizer;


class MenuBuilderFrontendRender
{
    protected $page_id;
    public function render_frrontend_panel_menu($id)
    {
        $output = '';
        if (empty($id)) {
            return $output;
        }
        $menu_details_from_db = Menu::find($id);
        if (is_null($menu_details_from_db)) {
            return $output;
        }
        $default_lang = $menu_details_from_db->lang ?? LanguageHelper::default_slug();
        $menu_data = json_decode($menu_details_from_db->content);
        $this->page_id = 1;
        if (count((array)$menu_data) > 0) {
            foreach ($menu_data as $menu_item) {
                $this->page_id++;
                $output .= $this->render_menu_item($menu_item, $this->page_id, $default_lang);
            }
        }
        return $output;
    }
    public function new_render_frrontend_panel_menu($id)
    {
        $output = '';
        $img_html_1 = '<a href="#home" id="logo">
                        <img src="' . asset("assets/frontend/img/logos/logo.png") . '" class="w-50" alt="">
                    </a>';
        $img_html_2 = '<a href="#home" id="logo2">
                        <img src="' . asset("assets/frontend/img/logos/logo.png") . '" class="w-50" alt="">
                    </a>';
        // $search_html = ' <div><form class="d-flex">
        //                         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        //                         <button class="btn btn-outline-primary" type="submit">Search</button>
        //                 </form></div>';
        // $search_html = ' <form class="d-flex">
        //                         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        //                         <button class="btn btn-outline-primary" type="submit">Search</button>
        //                 </form>';
        $menu_details_from_db = Menu::find($id);
        if (is_null($menu_details_from_db)) {
            return $output;
        }
        $default_lang = $menu_details_from_db->lang ?? LanguageHelper::default_slug();
        $menu_data = json_decode($menu_details_from_db->content);
        $this->page_id = 1;
        $links = '';
        if (count((array)$menu_data) > 0) {
            foreach ($menu_data as $menu_item) {
                $this->page_id++;
                if (isset($menu_item->children)) {
                    $links .= '<div class="dropdown">
                                    <button class="dropbtn">' . $menu_item->pname . '
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-content flex-column">';
                    foreach ($menu_item->children as $item) {
                        if (isset($item->pslug)) {
                            if ($item->ptype == 'api_category') {
                                $url = route('frontend.dynamic.category', ['slug' => $item->pslug]);
                            }
                            if ($item->ptype == 'api_product') {
                                $url = route('frontend.dynamic.doc', ['slug' => $item->pslug]);
                            }
                            $links .= '<a href="' . $url . '">' . $item->pname . '</a>';
                        }
                    }
                    $links .= '</div></div>';
                } else {
                    $active_class = (isset($menu_item->purl)) ? 'active' : '';
                    if ($menu_item->ptype == 'ptype') {
                        $url = route('frontend.dynamic.doc', ['slug' => $menu_item->pslug]);
                    }
                    $url = (isset($menu_item->pslug)) ? '/' . $menu_item->pslug : route('homepage');
                    $links .= '<a href="' . $url . '" class="' . $active_class . '">' . $menu_item->pname . '</a>';
                }
            }
        }

        $output = '<nav>
                        <div class="topnav" id="myTopnav">
                            ' . $img_html_1 . '
                            ' . $links . '
                            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="NavBar()">☰</a>
                        </div>
                        <div class="scrollview mobile_scroll_nav" id="navbar">
                            ' . $img_html_2 . '
                            ' . $links . '
                            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="NavBar()">☰</a>
                        </div>
                    </nav>';

        return $output;
    }
    public function new_new_render_frrontend_panel_menu($id)
    {
        $output = '';
        if (empty($id)) {
            return $output;
        }
        $menu_details_from_db = Menu::find($id);
        if (is_null($menu_details_from_db)) {
            return $output;
        }
        $default_lang = $menu_details_from_db->lang ?? LanguageHelper::default_slug();
        $menu_data = json_decode($menu_details_from_db->content);
        $this->page_id = 1;
        if (count((array)$menu_data) > 0) {
            foreach ($menu_data as $menu_item) {
                $page_active_class = '';

                $dropdown = 0;
                $dropdown_class = '';
                $dropdown_html = '';

                $dynamic = 0;
                $dynamic_class = '';
                $dynamic_html = '';

                $this->page_id++;
                if (isset($menu_item->children)) {
                    $dropdown = 1;
                    $dynamic_html = '<div class="dropdown-content animate">';
                    foreach ($menu_item->children as $item) {
                        if (isset($item->pslug)) {
                            if ($item->ptype == 'api_category') {
                                $url = route('frontend.dynamic.category', ['slug' => $item->pslug]);
                            }
                            if ($item->ptype == 'api_product') {
                                $url = route('frontend.dynamic.doc', ['slug' => $item->pslug]);
                            }
                            $dynamic_html .= '<a href="' . $url . '">' . $item->pname . '</a>';
                        }
                    }
                    $dynamic_html .= '</div>';
                    // $dynamic_html = '<ul class="dropdown-menu" aria-labelledby="navbarDropdown1"> ';
                    // foreach ($menu_item->children as $item) {
                    //     if (isset($item->pslug)) {
                    //         $dynamic_html .= '<li><a class="dropdown-item" href="' . route('frontend.dynamic.' . strtolower($menu_item->pname), ['slug' => $item->pslug]) . '">' . $item->pname . '</a></li>';
                    //     }
                    // }
                    // $dynamic_html .= '</ul>';
                }
                if ($dropdown) {
                    $output .= '<div class="dropdown">
                                    <button class="dropbtn">' . $menu_item->pname . '
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                    ' . $dynamic_html . '
                                </div';
                    // $output .= ' <li class="nav-item dropdown"> 
                    //                 <a class="nav-link dropdown-toggle" href="/' . $menu_item->pslug . '" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false"> ' . $menu_item->pname . ' </a> 
                    //                     ' . $dynamic_html . '
                    //             </li>';
                } else {
                    $output .= ' <li class="nav-item">
                                    <a class="nav-link" href="#">' . $menu_item->pname . '</a>
                                </li>';
                }
            }
        }
        return $output;
    }
    private function get_attribute_string(array $li_attributes): string
    {
        if (empty($li_attributes)) {
            return '';
        }
        $attr_val = '';
        foreach ($li_attributes as $attr => $value) {
            //fix class append issue
            if (!empty($value) && $attr != 'class') {
                $attr_val .= $attr . '="' . $value . '"';
            } elseif ($attr === 'class') {
                if (!is_array($value)) {
                    $attr_val .= $attr . '="' . $value . '"';
                } else {
                    $class_attr = 'class="';
                    foreach ($value as $cl) {
                        $class_attr .= ' ' . $cl . ' ';
                    }
                    $class_attr .= '"';
                    $attr_val = $class_attr;
                }
            }
        }
        return $attr_val;
    }
    private function render_li_start(string $title, array $attributes_string, $default_lang)
    {
        $output = "\n\t" . '<li ' . $this->get_attribute_string($attributes_string) . '> ' . "\n";
        return $output;
    }
    private function new_render_li_start(string $title, array $attributes_string, $default_lang)
    {
        $output = "\n\t" . '<li ' . $this->get_attribute_string($attributes_string) . '> ' . "\n";
        return $output;
    }
    private function render_menu_item($menu_item, int $page_id, $default_lang)
    {
        $attributes_string = property_exists($menu_item, 'children') ? ['class' => ['menu-item-has-children']]  : [];
        if (empty((array)$menu_item)) {
            return;
        }
        $menu_item = (object) $menu_item;
        $ptype =  property_exists($menu_item, 'ptype') ? $menu_item->ptype : '';
        $pname =  property_exists($menu_item, 'pname') ? $menu_item->pname : '';
        $output = '';
        if ($ptype === 'custom') {
            //check to activation class
            if (request()->path() === $menu_item->purl) {
                if (isset($attributes_string['class'])) {
                    $attributes_string[] = ['class' => ['current-menu-item']];
                } else {
                    $attributes_string['class'][] = 'current-menu-item';
                }
            }
            $output .=  $this->render_li_start($pname, $attributes_string, $default_lang);
            $title = $pname;
            $output .= $this->get_anchor_markup($title, [
                'href' => str_replace('@url', url('/'), $menu_item->purl),
                'target' => $menu_item->antarget ?? '',
            ], $menu_item->icon ?? '');
        } elseif ($ptype === 'api_category') {
            //check to activation class
            if (request()->path() === $menu_item->purl) {
                if (isset($attributes_string['class'])) {
                    $attributes_string[] = ['class' => ['current-menu-item']];
                } else {
                    $attributes_string['class'][] = 'current-menu-item';
                }
            }
            $output .=  $this->render_li_start($pname, $attributes_string, $default_lang);
            $title = $pname;
            $output .= $this->get_anchor_markup($title, [
                'href' => str_replace('@url', url('/'), $menu_item->proute),
                'target' => $menu_item->antarget ?? '',
            ], $menu_item->icon ?? '');
        } elseif ($ptype === 'api_product') {
            //check to activation class
            if (request()->path() === $menu_item->purl) {
                if (isset($attributes_string['class'])) {
                    $attributes_string[] = ['class' => ['current-menu-item']];
                } else {
                    $attributes_string['class'][] = 'current-menu-item';
                }
            }
            $output .=  $this->render_li_start($pname, $attributes_string, $default_lang);
            $title = $pname;
            $output .= $this->get_anchor_markup($title, [
                'href' => str_replace('@url', url('/'), $menu_item->proute),
                'target' => $menu_item->antarget ?? '',
            ], $menu_item->icon ?? '');
        } elseif ($ptype === 'static') {
            $menu_slug =  get_static_option(str_replace('-', '_', $menu_item->pslug) . '_page_slug');
            if (request()->path() == $menu_slug) {
                if (isset($attributes_string['class'])) {
                    $attributes_string['class'][] = 'current-menu-item';
                } else {
                    $attributes_string['class'] =  ['current-menu-item'];
                }
            }
            $page_name = MenuBuilderSetup::multilang() ? '_page_' . $default_lang . '_name' : '_page_name';
            $title = get_static_option(str_replace('-', '_', $menu_item->pslug) . $page_name) ?? '';
            $output .=  $this->render_li_start($pname, $attributes_string, $default_lang);
            // get anchor data
            $output .= $this->get_anchor_markup($title, [
                'href' => url('/') . '/' . $menu_slug ?? '',
                'target' => $menu_item->antarget ?? '',
            ], $menu_item->icon ?? '');
        } else {
            //check is mega menu
            preg_match('/MegaMenus/', $ptype, $matches);
            if (!empty($matches[0])) {

                $li_attributes = ['class' => 'menu-item-has-mega-menu'];

                $class_name = '\\' . $ptype;
                $instance = new $class_name();
                if ($instance->enable()) {
                    $static_name = str_replace('[lang]', $default_lang, $instance->name());
                    $title = htmlspecialchars(strip_tags(get_static_option($static_name)));
                    $output .=  $this->render_li_start($title, $li_attributes, $default_lang);
                    // get anchor data
                    $output .= $this->get_anchor_markup($title, [
                        'href' => url('/') . '/' . get_static_option($instance->slug()) ?? '#',
                        'target' => $menu_item->antarget ?? '',
                    ], $menu_item->icon ?? '');
                    $output .= $instance->render($menu_item->items_id ?? '', $default_lang, [
                        'sort' => $menu_item->mega_menu_order ?? '',
                        'sort_by' => $menu_item->mega_menu_orderby ?? '',
                        'category_status' => $menu_item->category_status ?? ''
                    ]);
                }
            } else {
                $menu_setup_instance = new MenuBuilderSetup();
                $all_dynamic_menus =  $menu_setup_instance->register_dynamic_menus();
                $dynamic_menu_type = $all_dynamic_menus[$ptype] ?? null;
                if ($dynamic_menu_type) {
                    //load dynamic page item
                    $model_name = '\\' . $dynamic_menu_type['model'];
                    $model = new $model_name();
                    if ($dynamic_menu_type['query'] === 'old_lang') {
                        $item_details = $model->where(['lang' => $default_lang])->where(['id' => $menu_item->pid, 'status' => 'publish'])->first();
                    } elseif ($dynamic_menu_type['query'] === 'new_lang') {
                        $item_details =  $model->with(['lang_query' => function ($query) use ($default_lang) {
                            $query->where('lang', $default_lang);
                        }])->where(['id' => $menu_item->pid, 'status' => 'publish'])->first();
                    } else {
                        $item_details = $model->where(['id' => $menu_item->pid, 'status' => 'publish'])->first();
                    }
                    if (empty($item_details)) {
                        return;
                    }
                    $title_param = $dynamic_menu_type['title_param'];
                    if ($dynamic_menu_type['query'] === 'old_lang') {
                        $title = $item_details->$title_param ?? '';
                    } elseif ($dynamic_menu_type['query'] === 'new_lang') {
                        $title = $item_details->lang_query->$title_param ?? '';
                    } else {
                        $title = $item_details->$title_param ?? '';
                    }

                    if (request()->routeIs($dynamic_menu_type['route'])) {
                        if (isset($attributes_string['class'])) {
                            $attributes_string['class'][] = 'current-menu-item';
                        } else {
                            $attributes_string['class'] =  ['current-menu-item'];
                        }
                    }

                    $output .=  $this->render_li_start($title, $attributes_string, $default_lang);
                    // get anchor data
                    $route_params = [];
                    $route_params_list = $dynamic_menu_type['route_params'] ?? [];
                    foreach ($route_params_list as $param) {
                        if ($dynamic_menu_type['query'] === 'old_lang') {
                            $dynamic_param = $item_details->$param ?? '';
                        } elseif ($dynamic_menu_type['query'] === 'new_lang') {
                            $dynamic_param = $item_details->lang_query->$param ?? '';
                        } else {
                            $dynamic_param = $item_details->$param ?? '';
                        }
                        if (preg_match('/id/', $param)) {
                            $route_params['id'] = $dynamic_param;
                        } else {
                            $route_params[$param] = $dynamic_param;
                        }
                    }
                    $output .= $this->get_anchor_markup($title, [
                        'href' => route($dynamic_menu_type['route'], $route_params),
                        'target' => $menu_item->antarget ?? '',
                    ], $menu_item->icon ?? '');
                }
            }
        }
        //check it has children
        if (property_exists($menu_item, 'children')) {
            $output .= $this->render_children_item($menu_item->children, $default_lang);
        }
        $output .= '</li>';
        return $output;
    }
    private function new_render_menu_item($menu_item, int $page_id, $default_lang)
    {
        $attributes_string = property_exists($menu_item, 'children') ?
            [
                'class' => ['dropdown'],
                'anchor' =>
                [
                    'class' => ['dropdown-toggle'],
                    'id' => str_replace(' ', '-', strtolower($menu_item->pname)),
                    'role' => "button",
                    'data-bs-toggle' => "dropdown",
                    'aria-expanded' => "false"
                ]
            ] : [];
        if (empty((array)$menu_item)) {
            return;
        }
        $menu_item = (object) $menu_item;
        $ptype =  property_exists($menu_item, 'ptype') ? $menu_item->ptype : '';
        $pname =  property_exists($menu_item, 'pname') ? $menu_item->pname : '';
        $output = '';
        if ($ptype === 'custom') {
            //check to activation class
            if (request()->path() === $menu_item->purl) {
                if (isset($attributes_string['class'])) {
                    $attributes_string[] = ['class' => ['current-menu-item']];
                } else {
                    $attributes_string['class'][] = 'current-menu-item';
                }
            }
            $output .=  $this->new_render_li_start($pname, $attributes_string, $default_lang);
            $title = $pname;
            $output .= $this->new_get_anchor_markup($title, [
                'href' => str_replace('@url', url('/'), $menu_item->purl),
                'target' => $menu_item->antarget ?? '',
            ], $menu_item->icon ?? '');
        } elseif ($ptype === 'api_category') {
            //check to activation class
            if (request()->path() === $menu_item->purl) {
                if (isset($attributes_string['class'])) {
                    $attributes_string[] = ['class' => ['current-menu-item']];
                } else {
                    $attributes_string['class'][] = 'current-menu-item';
                }
            }
            $output .=  $this->new_render_li_start($pname, $attributes_string, $default_lang);
            $title = $pname;
            $output .= $this->new_get_anchor_markup($title, [
                'href' => str_replace('@url', url('/'), $menu_item->proute),
                'target' => $menu_item->antarget ?? '',
            ], $menu_item->icon ?? '');
        } elseif ($ptype === 'api_product') {
            //check to activation class
            if (request()->path() === $menu_item->purl) {
                if (isset($attributes_string['class'])) {
                    $attributes_string[] = ['class' => ['current-menu-item']];
                } else {
                    $attributes_string['class'][] = 'current-menu-item';
                }
            }
            $output .=  $this->new_render_li_start($pname, $attributes_string, $default_lang);
            $title = $pname;
            $output .= $this->new_get_anchor_markup($title, [
                'href' => str_replace('@url', url('/'), $menu_item->proute),
                'target' => $menu_item->antarget ?? '',
            ], $menu_item->icon ?? '');
        } elseif ($ptype === 'static') {
            $menu_slug =  get_static_option(str_replace('-', '_', $menu_item->pslug) . '_page_slug');
            if (request()->path() == $menu_slug) {
                if (isset($attributes_string['class'])) {
                    $attributes_string['class'][] = 'current-menu-item';
                } else {
                    $attributes_string['class'] =  ['current-menu-item'];
                }
            }
            $page_name = MenuBuilderSetup::multilang() ? '_page_' . $default_lang . '_name' : '_page_name';
            $title = get_static_option(str_replace('-', '_', $menu_item->pslug) . $page_name) ?? '';
            $output .=  $this->new_render_li_start($pname, $attributes_string, $default_lang);
            // get anchor data
            $output .= $this->new_get_anchor_markup($title, [
                'href' => url('/') . '/' . $menu_slug ?? '',
                'target' => $menu_item->antarget ?? '',
            ], $menu_item->icon ?? '');
        } else {
            //check is mega menu
            preg_match('/MegaMenus/', $ptype, $matches);
            if (!empty($matches[0])) {

                $li_attributes = ['class' => 'menu-item-has-mega-menu'];

                $class_name = '\\' . $ptype;
                $instance = new $class_name();
                if ($instance->enable()) {
                    $static_name = str_replace('[lang]', $default_lang, $instance->name());
                    $title = htmlspecialchars(strip_tags(get_static_option($static_name)));
                    $output .=  $this->new_render_li_start($title, $li_attributes, $default_lang);
                    // get anchor data
                    $output .= $this->new_get_anchor_markup($title, [
                        'href' => url('/') . '/' . get_static_option($instance->slug()) ?? '#',
                        'target' => $menu_item->antarget ?? '',
                    ], $menu_item->icon ?? '');
                    $output .= $instance->render($menu_item->items_id ?? '', $default_lang, [
                        'sort' => $menu_item->mega_menu_order ?? '',
                        'sort_by' => $menu_item->mega_menu_orderby ?? '',
                        'category_status' => $menu_item->category_status ?? ''
                    ]);
                }
            } else {
                $menu_setup_instance = new MenuBuilderSetup();
                $all_dynamic_menus =  $menu_setup_instance->register_dynamic_menus();
                $dynamic_menu_type = $all_dynamic_menus[$ptype] ?? null;
                if ($dynamic_menu_type) {
                    //load dynamic page item
                    $model_name = '\\' . $dynamic_menu_type['model'];
                    $model = new $model_name();
                    if ($dynamic_menu_type['query'] === 'old_lang') {
                        $item_details = $model->where(['lang' => $default_lang])->where(['id' => $menu_item->pid, 'status' => 'publish'])->first();
                    } elseif ($dynamic_menu_type['query'] === 'new_lang') {
                        $item_details =  $model->with(['lang_query' => function ($query) use ($default_lang) {
                            $query->where('lang', $default_lang);
                        }])->where(['id' => $menu_item->pid, 'status' => 'publish'])->first();
                    } else {
                        $item_details = $model->where(['id' => $menu_item->pid, 'status' => 'publish'])->first();
                    }
                    if (empty($item_details)) {
                        return;
                    }
                    $title_param = $dynamic_menu_type['title_param'];
                    if ($dynamic_menu_type['query'] === 'old_lang') {
                        $title = $item_details->$title_param ?? '';
                    } elseif ($dynamic_menu_type['query'] === 'new_lang') {
                        $title = $item_details->lang_query->$title_param ?? '';
                    } else {
                        $title = $item_details->$title_param ?? '';
                    }

                    if (request()->routeIs($dynamic_menu_type['route'])) {
                        if (isset($attributes_string['class'])) {
                            $attributes_string['class'][] = 'current-menu-item';
                        } else {
                            $attributes_string['class'] =  ['current-menu-item'];
                        }
                    }

                    $output .=  $this->new_render_li_start($title, $attributes_string, $default_lang);
                    // get anchor data
                    $route_params = [];
                    $route_params_list = $dynamic_menu_type['route_params'] ?? [];
                    foreach ($route_params_list as $param) {
                        if ($dynamic_menu_type['query'] === 'old_lang') {
                            $dynamic_param = $item_details->$param ?? '';
                        } elseif ($dynamic_menu_type['query'] === 'new_lang') {
                            $dynamic_param = $item_details->lang_query->$param ?? '';
                        } else {
                            $dynamic_param = $item_details->$param ?? '';
                        }
                        if (preg_match('/id/', $param)) {
                            $route_params['id'] = $dynamic_param;
                        } else {
                            $route_params[$param] = $dynamic_param;
                        }
                    }
                    $output .= $this->new_get_anchor_markup($title, [
                        'href' => route($dynamic_menu_type['route'], $route_params),
                        'target' => $menu_item->antarget ?? '',
                    ], $menu_item->icon ?? '');
                }
            }
        }
        //check it has children
        if (property_exists($menu_item, 'children')) {
            $output .= $this->render_children_item($menu_item->children, $default_lang);
        }
        $output .= '</li>';
        return $output;
    }
    protected function render_children_item($menu_item, $default_lang)
    {
        if (empty((array)$menu_item)) {
            return;
        }
        $output = '';
        $output .= '<ul class="sub-menu">' . "\n";
        foreach ($menu_item as $ch_item) {
            $this->page_id += 1;
            $output .=  $this->render_menu_item($ch_item, $this->page_id, $default_lang);
        }
        $output .= '</ul>' . "\n";
        return $output;
    }
    private function get_anchor_markup(string $title, array $args, $icon = null)
    {
        $icon_markup = $icon ? "<i class='" . $icon . "'></i>" : '';
        return "\t\t" . '<a ' . $this->get_attribute_string($args) . '>' . $icon_markup . htmlspecialchars(strip_tags($title)) . '</a>' . "\n";
    }
    private function new_get_anchor_markup(string $title, array $args, $icon = null)
    {
        $icon_markup = $icon ? "<i class='" . $icon . "'></i>" : '';
        return "\t\t" . '<a ' . $this->get_attribute_string($args) . '>' . $icon_markup . htmlspecialchars(strip_tags($title)) . '</a>' . "\n";
    }
}
