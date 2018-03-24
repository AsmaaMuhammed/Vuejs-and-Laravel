@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('companieslables.title')
                </div>
                <div class="panel-body table-responsive">
                    <router-view name="companiesIndex" ></router-view>
                    <router-view></router-view>
                </div>

            </div>

        </div>

    </div>
@endsection
