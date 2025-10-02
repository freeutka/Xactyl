@extends('layouts.admin')

@section('title')
    Administration
@endsection

@section('content-header')
    <h1>Administrative Overview<small>A quick glance at your system.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Index</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box
            @if($version->isLatestPanel())
                box-success
            @else
                box-danger
            @endif
        ">
            <div class="box-header with-border">
                <h3 class="box-title">System Information</h3>
            </div>
            <div class="box-body">
                @if ($version->isLatestPanel())
                    You are running Xactyl Panel version <code>{{ config('app.version') }}</code>. Your panel is up-to-date!
                @else
                    Your panel is <strong>not up-to-date!</strong> The latest version is <a href="https://github.com/freeutka/Xactyl/releases/v{{ $version->getPanel() }}" target="_blank"><code>{{ $version->getPanel() }}</code></a> and you are currently running version <code>{{ config('app.version') }}</code>.
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-bottom:15px;">
    <div class="col-md-2 col-sm-4 col-xs-6">
        <div class="small-box" style="background-color:#444444; color:#ff4d4d;">
            <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>Total Users</p>
            </div>
            <div class="icon"><i class="fa fa-users"></i></div>
        </div>
    </div>

    <div class="col-md-2 col-sm-4 col-xs-6">
        <div class="small-box" style="background-color:#444444; color:#ff4d4d;">
            <div class="inner">
                <h3>{{ $totalServers }}</h3>
                <p>Total Servers</p>
            </div>
            <div class="icon"><i class="fa fa-server"></i></div>
        </div>
    </div>

    <div class="col-md-2 col-sm-4 col-xs-6">
        <div class="small-box" style="background-color:#444444; color:#ff4d4d;">
            <div class="inner">
                <h3>{{ $totalAllocations }}</h3>
                <p>Total Allocations</p>
            </div>
            <div class="icon"><i class="fa fa-plug"></i></div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box" style="background-color:#444444; color:#ff4d4d;">
            <div class="inner">
                <h3>{{ $totalRamDisplay }}</h3>
                <p>Total RAM use</p>
            </div>
            <div class="icon"><i class="fa fa-microchip"></i></div> 
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box" style="background-color:#444444; color:#ff4d4d;">
            <div class="inner">
                <h3>{{ $totalDiskDisplay }}</h3>
                <p>Total Disk use</p>
            </div>
            <div class="icon"><i class="fa fa-hdd-o"></i></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-3 text-center">
        <a href="{{ $version->getDiscord() }}"><button class="btn btn-warning" style="width:100%;"><i class="fa fa-fw fa-support"></i> Get Help <small>(via Discord)</small></button></a>
    </div>
    <div class="col-xs-6 col-sm-3 text-center">
        <a href="https://freeutka.github.io/Xactyl-docs"><button class="btn btn-primary" style="width:100%;"><i class="fa fa-fw fa-link"></i> Documentation</button></a>
    </div>
    <div class="clearfix visible-xs-block">&nbsp;</div>
    <div class="col-xs-6 col-sm-3 text-center">
        <a href="https://github.com/freeutka/Xactyl"><button class="btn btn-primary" style="width:100%;"><i class="fa fa-fw fa-support"></i> Github</button></a>
    </div>
    <div class="col-xs-6 col-sm-3 text-center">
        <a href="{{ $version->getDonations() }}"><button class="btn btn-success" style="width:100%;"><i class="fa fa-fw fa-money"></i> Support the Project (Pterodactyl)</button></a>
    </div>
</div>
@endsection
