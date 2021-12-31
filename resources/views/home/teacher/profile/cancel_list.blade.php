@component('home.teacher.content',['title'=>' تنظیمات '])


<div id="teacherpish">

    @slot('bread')


    @include('home.teacher.profile.bread_left',['name'=>'کیف پول '])
    @endslot
</div>

<div class="etebar-table shade">
    <div class="widget-title">
        <h3> کلاس های ویرایش شده</h3>
        <div class="dot3">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="widget-content">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <p><i class="icon-traconesh"></i>تمام   کلاس های ویرایش شده شما در اینجا لیست شده اند</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div>

                    <div class="table-responsive">

                        <table>
                            <tbody><tr>
                                <th>شماره</th>
                                <th> نام زبان آموز</th>
                                <th> پیغام زبان آموز</th>
                                <th> تاریخ و ساعت قبلی</th>
                                <th> تاریخ و ساعت جدید</th>
                            </tr>
                                    @php
                                    @endphp
                            @foreach($user->tmeets()->latest()->get() as $cm)
                                @php
                                    $meet=\App\Models\Meet::find($cm->meet_id);
                                    $student=$meet->suser;
                                    $meet_after=\App\Models\Meet::find($cm->meet_id_after);
                                @endphp
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        @if($student)
                                        {{$student->name}}
                                        {{$student->family}}
                                        @endif
                                    </td>

                                    <td>{{$cm->reason}}</td>
                                    <td>
                                        @if($meet)
                                            {{\Morilog\Jalali\Jalalian::forge($meet->start) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($meet_after)
                                            {{\Morilog\Jalali\Jalalian::forge($meet_after->start) }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endcomponent
