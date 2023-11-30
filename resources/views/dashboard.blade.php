@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-default">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Filtre por um operador</label>
                <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
                </div>
                <!-- /.form-group -->
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                <label>Filtro:</label>
                <div style="display: flex;">
                <button type="button" class="btn btn-block btn-primary" style="width: 50px; max-height: 38px; margin: 0; margin-right: 10px;">Dia</button>
                <button type="button" class="btn btn-block btn-default" style="width: 60px; max-height: 38px; margin: 0; margin-right: 10px;">Mês</button>
                <button type="button" class="btn btn-block btn-default" style="width: 120px; max-height: 38px; margin: 0; margin-right: 10px;">Mês passado</button>
                <button type="button" class="btn btn-block btn-default" style="max-width: 75px; max-height: 38px; margin: 0; margin-right: 10px;">Outros</button>
                </div>
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div>
        </div>
        <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>
                <p>Qtd. atendimentos</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                <h3>53</h3>

                <p>Atendimentos abertos</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>

                <p>Atendimentos finalizados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <div class="inner">
                <h3>65s</h3>

                <p>Tempo médio de reposta</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card bg-gradient-info">
            <div class="card-header border-0">
                <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                Atendimentos Graph
                </h3>

                <div class="card-tools">
                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
                </div>
            </div>
            <div class="card-body" style="min-height: 440px;display: flex;align-items: center;">
                <canvas class="chart" id="line-chart"
                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-transparent">
                <div class="row">
                <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                    data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                    data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                    data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                </div>
                <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-footer -->
            </div>
            <div class="card" style="display: none;">
            <div class="card-header">
                <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Atendimentos
                </h3>
                <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                </ul>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
                </div>
            </div><!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- TO DO List -->

            <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary" style="display: none;">
            <div class="card-header border-0">
                <h3 class="card-title">
                <i class="fas fa-map-marker-alt mr-1"></i>
                Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.card-body-->
            <div class="card-footer bg-transparent">
                <div class="row">
                <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                </div>
                <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Top 10</h3><br>
                <p style="display: block; font-size: 14px; margin: 0;">Clientes que mais geram atendimento</p>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th style="width: 180px">Total atendimentos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1.</td>
                    <td>John Doe</td>
                    <td><span class="badge bg-danger" style="background-color: #27A745 !important;">55</span></td>
                    </tr>
                    <tr>
                    <td>2.</td>
                    <td>Jane Smith</td>
                    <td><span class="badge bg-danger" style="background-color: #27A745 !important;">45</span></td>
                    </tr>
                    <tr>
                    <td>3.</td>
                    <td>Mark Johnson</td>
                    <td><span class="badge bg-danger" style="background-color: #27A745 !important;">35</span></td>
                    </tr>
                    <tr>
                    <td>4.</td>
                    <td>Emily Williams</td>
                    <td><span class="badge bg-danger" style="background-color: #27A745 !important;">25</span></td>
                    </tr>
                    <tr>
                    <td>5.</td>
                    <td>Michael Brown</td>
                    <td><span class="badge bg-danger" style="background-color: #27A745 !important;">15</span></td>
                    </tr>
                    <tr>
                    <td>6.</td>
                    <td>Alice Lee</td>
                    <td><span class="badge bg-danger" style="background-color: #27A745 !important;">10</span></td>
                    </tr>
                    <tr>
                    <td>7.</td>
                    <td>Robert Davis</td>
                    <td><span class="badge bg-danger" style="background-color: #27A745 !important;">9</span></td>
                    </tr>
                    <tr>
                    <td>8.</td>
                    <td>Sarah Miller</td>
                    <td><span class="badge bg-danger" style="background-color: #27A745 !important;">8</span></td>
                    </tr>
                    <tr>
                    <td>9.</td>
                    <td>William Wilson</td>
                    <td><span class="badge bg-danger" style="background-color: #27A745 !important;">7</span></td>
                    </tr>
                    <tr>
                    <td>10.</td>
                    <td>Linda Taylor</td>
                    <td><span class="badge bg-danger" style="background-color: #27A745 !important;">6</span></td>
                    </tr>
                </tbody>
                </table>
                
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </section>
        <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

