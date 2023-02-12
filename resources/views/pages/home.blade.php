@extends('layouts.layout')

@section('content')

        <section>

            <div id="main-wrapper" class="d-flex">
                <div class="main-container mt-5 col-10  p-4">
                    <form id="searchTrips" action="{{route('searchTrips')}}">
                        @csrf
                        <div class="from-to-dropdowns flex-column row d-flex ">
                            <div class=" mb-4">
                                <div class="form-control d-flex flex-column">
                                    <label class="h-blue">TRAIN FROM</label>
                                    <select class="form-select select2 inputbox" id="train_from" name="train_from" data-live-search="true"  required >
                                        <option value="0">Select</option>
                                        @foreach($city_stations as $city_station)
                                        <option value="{{$city_station['id']}}">{{$city_station['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                <div class="mb-4">
                                    <div class="form-control d-flex flex-column">
                                        <label class="h-blue">TRAIN TO</label>
                                        <select class="form-select select2 inputbox" id="train_to" name="train_to" data-live-search="true" >
                                            <option value="0">Select</option>
                                            @foreach($city_stations as $city_station)
                                                <option value="{{$city_station['id']}}">{{$city_station['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            <div class=" mb-4">
                                <div class="form-control d-flex flex-column">
                                    <label class="h-blue">DEPARTING</label>
                                    <input  id="departure" name="departure" class="inputbox "  type="date" >
                                </div>
                            </div>
                            <div class="invalid-err text-danger">

                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-center">
                            <button id="search_routes" type="submit" class="btn-search btn btn-primary form-control ">
                                SEARCH
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </section>

        <section>
            <div class="mt-5  trips-wrapper " >


                    <div class="empty-table-msg"></div>
                    <div class="col-10 table-responsive trip-table-wrapper">
                        <table class="table accordion" >
                            <thead class="table-secondary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Arrival</th>
                                <th scope="col">Departure</th>
                                <th scope="col">Time</th>
                                <th scope="col">Distance</th>
                                <th scope="col">Carrier</th>
                                <th scope="col">Details</th>
                            </tr>
                            </thead>
                            <tbody id="records_table">
                            </tbody>
                        </table>

                    </div>


            </div>
        </section>

        <div class="row w-100" style="margin-top: 10%;">
            <img src="{{asset('images/61f118f07f1151643190512.png')}}"/>
        </div>

        <div class="viewport  w-100" style="">
            <div class="train-container" >
                <img src="{{asset('images/train.png')}}" />
            </div>
        </div>

@endsection
