<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Alumni</a>
    </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          @foreach($menu->all() as $item)

            @if(isset($item->link) && isset($item->disabled))
              <li class="disabled">
                <a href="{{ $item->link }}">{{ $item->title }}</a>
              </li>

            @elseif(isset($item->link))
              <li>
                <a href="{{ $item->link }}">{{ $item->title }}</a>
              </li>

            @elseif(isset($item->menu))
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  {{ $item->title }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">

                  @foreach($item->menu->all() as $subItem)
                    @if(isset($subItem->link) && isset($subItem->disabled))
                      <li class="disabled">
                        <a href="{{ $subItem->link }}">
                          {{ $subItem->title }}
                        </a>
                      </li>

                    @elseif(isset($subItem->link))
                      <li>
                        <a href="{{ $subItem->link }}">
                          {{ $subItem->title }}
                        </a>
                      </li>

                    @elseif($subItem->type === 'heading')
                      <li class="dropdown-header">
                        {{ $subItem->title }}
                      </li>

                    @elseif($subItem->type === 'divider')
                      <li class="divider"></li>

                    @endif
             @endforeach

               </ul>
              </li>

            @endif
            @endforeach

         </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Default</a></li>
          <li><a href="#">Static top</a></li>
          <li><a href="#">Fixed top</a></li>
        </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
