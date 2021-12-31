@if ($paginator->lastPage() > 1)


    <ul class="pagination justify-content-center">

        <li><a href="{{ $paginator->url($paginator->currentPage()+1) }}"><i class="icon2-right-big"></i></a></li>

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li  class="{{ ($paginator->currentPage() == $i) ? ' active' : ' ' }}">
                <a  class="{{ ($paginator->currentPage() == $i) ? ' active' : 'page-link' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li><a  href="{{ $paginator->url($paginator->currentPage()-1) }}"><i class="icon2-left-big"></i></a></li>
    </ul>


@endif
