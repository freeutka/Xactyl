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
<div class="row">
    <div class="col-md-2">
        <div class="box box-info text-center">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-users"></i> Total Users</h3>
            </div>
            <div class="box-body">
                <h2 class="no-margin">{{ $totalUsers }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="box box-info text-center">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-server"></i> Total Servers</h3>
            </div>
            <div class="box-body">
                <h2 class="no-margin">{{ $totalServers }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="box box-info text-center">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plug"></i> Total Allocations</h3>
            </div>
            <div class="box-body">
                <h2 class="no-margin">{{ $totalAllocations }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box box-info text-center">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-microchip"></i> Total RAM Use</h3>
            </div>
            <div class="box-body">
                <h2 class="no-margin">{{ $totalRamDisplay }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box box-info text-center">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-hdd-o"></i> Total Disk Use</h3>
            </div>
            <div class="box-body">
                <h2 class="no-margin">{{ $totalDiskDisplay }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-info-circle"></i> System Environment</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-hover" style="table-layout: fixed;">
                    <tbody>
                        <tr>
                            <td class="text-muted" style="vertical-align: middle;"><strong>PHP Version</strong></td>
                            <td style="vertical-align: middle;"><span class="label label-primary">{{ phpversion() }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="vertical-align: middle;"><strong>Server Time</strong></td>
                            <td style="vertical-align: middle;"><code>{{ now()->format('H:i:s') }}</code></td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="vertical-align: middle;"><strong>Load Average</strong></td>
                            <td style="vertical-align: middle;">
                                @php $load = sys_getloadavg(); @endphp
                                <span class="label @if($load[0] > 1.0) label-warning @else label-success @endif">{{ number_format($load[0], 2) }}</span>
                                <span class="label label-default" style="margin-left: 2px;">{{ number_format($load[1], 2) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="vertical-align: middle;"><strong>DB Driver</strong></td>
                            <td style="vertical-align: middle;"><code>{{ config('database.default') }}</code></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-heartbeat"></i> Platform Health</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-hover" style="table-layout: fixed;">
                    <tbody>
                        <tr>
                            <td class="text-muted"><strong>Application URL</strong></td>
                            <td class="text-right"><code>{{ config('app.url') }}</code></td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="vertical-align: middle;"><strong>SSL Status</strong></td>
                            <td class="text-right" style="vertical-align: middle;">
                                @if(request()->isSecure())
                                    <span class="label label-success">Secure</span>
                                @else
                                    <span class="label label-warning">Insecure</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted"><strong>Timezone</strong></td>
                            <td class="text-right"><code>{{ config('app.timezone') }}</code></td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="vertical-align: middle;"><strong>Environment</strong></td>
                            <td class="text-right" style="vertical-align: middle;"><code>{{ app()->environment() }}</code></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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