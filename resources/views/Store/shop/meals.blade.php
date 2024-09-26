@extends('Store.master')


@push('css')
    <style>
        h2 {
            text-align: center !important;
            color: #28a745 !important;
            margin-bottom: 20px;
        }




        .menu-day {
            margin-bottom: 20px;

            padding-bottom: 10px;
        }


        h3 {
            color: #ed0f0f;
            margin-bottom: 10px;
        }

        ul {
            padding: 5px;
        }

        li {
            padding: 5px 5px;
        }

        strong {
            color: #e74c3c;
            /* Red color for daily special */
        }
    </style>
@endpush

@section('content')
    <div class="mt-5 ">
        <h2 class="text-center mb-5">Weekly Menu</h2>
        <div class="container">
            <div class="row mb-5">
                @if ($meals && count($meals) > 0)
                    @foreach ($meals as $day => $mealsForTheDay)
                        <div class="menu-day col-6 mt-5">
                            <h3>{{ $day }}</h3>
                            <ul>
                                @foreach ($mealsForTheDay as $meal)
                                    <li>{{ $meal->name }}
                                        <strong>
                                            @if ($meal->is_daily_special === '1')
                                                - Daily Special
                                            @else
                                                <span></span>
                                            @endif
                                        </strong>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        <h4 class="text-center">Currently, there are no meals available for this week.</h4>
                    </div>
                @endif

            </div>

        </div>
    </div>
@endsection
