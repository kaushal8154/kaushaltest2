@extends('admin.layouts.app')
 
@section('title', 'Login')

@section('pagecontent')
  

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 1302.12px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content" >
        <div class="container-fluid" >
            <div class="row" >
                <div class="col-12" >
                    <div class="card" >
                        <div class="card-header" >
                            View User
                        </div>
                        <div class="card-body" >
                            <div class="row">
                                <div class="col-sm-12">

                                    <table class="viewinfo"  >
                                        <tr>
                                            <td>
                                                <label>Name:</label>
                                            </td>
                                            <td>{{ $pageData->firstname }} {{ $pageData->lastname }} </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label>Email:</label>
                                            </td>
                                            <td>{{ $pageData->email }}</td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label>Image:</label>
                                            </td>
                                            <td>                                                
                                                @if(trim($pageData->profile_photo) != '' && file_exists(storage_path('app/public/user_photos/'.$pageData->profile_photo)))
                                                    <img src="{{ asset('storage/user_photos/'.$pageData->profile_photo) }}" width="50" />
                                                @endif
                                            </td>
                                        </tr>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        
        </div>
    </section>

</div>    
    <!-- /.content-header -->

@endsection


@section('pagescript')
<script>
    
    $(document).ready(function(){
        
        $('#tblUsersList').DataTable({
			processing: true,
			serverSide: true,			
			//ajax: site_url+"/admin/usersdata",
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add the CSRF token
                },     
                url: site_url + "/admin/usersdata",
                type: "POST", // Set the HTTP method to POST
            },
			columns: [
				{ data: 'id', name: 'id' },
				{ data: 'fullname', name: 'fullname'},
				{ data: 'email', name: 'email' },
                { data: 'profile_photo', name: 'profile_photo',searchable:false,sortable:false},
                { data: 'date', name: 'date',searchable:false },
                { data: 'actions', name: 'actions',searchable:false,sortable:false },
			],
        });

    });

</script>
@endsection


@section('pagecss')

    <style>
        #tblUsersList{
            border: 0;
        }
        #tblUsersList tr.even td{
            background-color: whitesmoke;
        }
    </style>

@endsection