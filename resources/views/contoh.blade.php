@extends('layouts.master')
@section('tittle')
    Dashboard
@endsection 
@section('sidebar-contoh')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Contoh</a>       
@endsection

@section('content')
<!-- card -->
<div class="card" style="margin-bottom:25px">
    <div class="card-body">
        <h5 class="card-title">Contoh Form</h5>        
        <!-- form  -->
        <form>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="text" placeholder="Regular" class="form-control" disabled />
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-4">
                    <select class="form-control" id="exampleFormControlSelect1" name="tanggal" >                    
                            <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>                          
                        </select>                 
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group has-success">
                    <input type="text" placeholder="Success" class="form-control is-valid" />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group has-danger">
                    <input type="email" placeholder="Error Input" class="form-control is-invalid" />
                </div>
                </div>
            </div>
        </form>
        <!-- form berakhir -->
        <h5 class="card-title">Contoh Button</h5>        
        <button class="btn btn-icon btn-3 btn-primary" type="button">
            <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>            
            <span class="btn-inner--text">With icon</span>            
        </button>
        <button class="btn btn-icon btn-2 btn-primary" type="button">
            <span class="btn-inner--icon"><i class="ni ni-atom"></i></span>            
        </button>
        <!-- button kecil -->
        <button type="button" class="btn btn-primary btn-sm">Small button</button>
        <button type="button" class="btn btn-secondary btn-sm">Small button</button>
        <!-- btn berwarna -->
        <button type="button" class="btn btn-default">Default</button>
        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-secondary">Secondary</button>
        <button type="button" class="btn btn-info">Info</button>
        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-danger">Danger</button>
        <button type="button" class="btn btn-warning">Warning</button>
        <!-- button outline -->
        <button type="button" class="btn btn-outline-default">Default</button>
        <button type="button" class="btn btn-outline-primary">Primary</button>
        <button type="button" class="btn btn-outline-secondary">Secondary</button>
        <button type="button" class="btn btn-outline-info">Info</button>
        <button type="button" class="btn btn-outline-success">Success</button>
        <button type="button" class="btn btn-outline-danger">Danger</button>
        <button type="button" class="btn btn-outline-warning">Warning</button>
    </div>
</div>
<!-- End card -->
<div class="card"  style="margin-bottom:25px">
    <div class="card-body">
        <h5 class="card-title">Contoh Table</h5>   
        <div class="table-responsive">
            <div>
                <table class="table align-items-center">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Project</th>
                            <th scope="col">Budget</th>
                            <th scope="col">Status</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Completion</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">            
                        <tr>
                            <th scope="row" class="name">
                                <div class="media align-items-center">                                  
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">Argon Design System</span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                $2500 USD
                            </td>
                            <td class="status">
                                <span class="badge badge-dot mr-4">
                                    <i class="bg-warning"></i> pending
                                </span>
                            </td>
                            <td>
                                <div class="avatar-group">
                                    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                        <img alt="Image placeholder" src="{{asset('argon/img/theme/team-1-800x800.jpg')}}" class="rounded-circle">
                                    </a>                   
                                </div>
                            </td>
                            <td class="completion">
                                <div class="d-flex align-items-center">
                                    <label class="custom-toggle">
                                        <input type="checkbox" checked>
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </div>
                            </td>        
                            <td class="completion">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon btn-primary btn-sm" type="button">
                                        <span class="btn-inner--icon"><i class="ni ni-zoom-split-in"></i></span>            
                                    </button>                 
                                    <button class="btn btn-icon btn-warning btn-sm" type="button">
                                        <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>            
                                    </button> 
                                    <button class="btn btn-icon btn-danger btn-sm" type="button">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>            
                                    </button> 
                                </div>
                            </td>                           
                        </tr>            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection