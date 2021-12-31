@if ($paginator->lastPage() > 1)

    <div class="pagination">
        <div class="number">


            <ul>
{{--                <li><a href="#">1</a></li>--}}
{{--                <li class="active"><a href="#">2</a></li>--}}
{{--                <li><span>...</span></li>--}}
{{--                <li><a href="#">14</a></li>--}}
{{--                <li><a href="#">15</a></li>--}}
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a  href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

            </ul>
        </div>
        <div class="result">
            <span>صفحه
{{$paginator->currentPage()}}
                از
               {{$paginator->lastPage()}}
            </span>
        </div>

        <div class="next-prev">

            <span class="next-page {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">

                <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >    <i class="icon-arrow-right-line"></i></a>

            </span>
            <span class="prev-page{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} ">
                     <a href="{{ $paginator->url($paginator->currentPage()-1) }}">  <i class="icon-arrow-right-line"></i></a>

            </span>
        </div>
    </div>

@endif
