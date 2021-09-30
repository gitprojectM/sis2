@extends('layouts.master')
@section('content')
<section class="content">
    <div class="">
        
        
        
        <!-- /.col -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <div class=""><h2>Previews Subjects</h2></div> 
                        
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                 
                    @if(count($Grade7subjects)>0)
                        <h3>Grade 7</h3>
                        <table class="table table-defualt">
                                <thead>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                        @foreach($Grade7subjects as $Grade7subject)
                                    <tr>
                                        <td>{{$Grade7subject->subject}}</td>
                                        <td>{{$Grade7subject->name}}</td>
                                        <td>{{$Grade7subject->fname}} {{$Grade7subject->lname}}<td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                </tfoot>
                            </table>
                            

                    
                    @else

                    
                    @endif
                  
                    @if(count($Grade8subjects)>0)
                    <h3>Grade 8</h3>
                        <table class="table table-defualt">
                                <thead>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                        @foreach($Grade8subjects as $Grade8subject)
                                    <tr>
                                        <td>{{$Grade8subject->subject}}</td>
                                        <td>{{$Grade8subject->name}}</td>
                                        <td>{{$Grade8subject->fname}} {{$Grade8subject->lname}}<td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                </tfoot>
                            </table>
                            

                    
                    @else

                    
                    @endif
                  
                    @if(count($Grade9subjects)>0)
                    <h3>Grade 9</h3>
                        <table class="table table-defualt">
                                <thead>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                        @foreach($Grade9subjects as $Grade9subject)
                                    <tr>
                                        <td>{{$Grade9subject->subject}}</td>
                                        <td>{{$Grade9subject->name}}</td>
                                        <td>{{$Grade9subject->fname}} {{$Grade9subject->lname}}<td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                </tfoot>
                            </table>
                            

                    
                    @else

                    
                    @endif
                   
                    @if(count($Grade10subjects)>0)
                    <h3>Grade 10</h3>
                        <table class="table table-defualt">
                                <thead>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                        @foreach($Grade10subjects as $Grade10subject)
                                    <tr>
                                        <td>{{$Grade10subject->subject}}</td>
                                        <td>{{$Grade10subject->name}}</td>
                                        <td>{{$Grade10subject->fname}} {{$Grade10subject->lname}}<td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                </tfoot>
                            </table>
                            

                    
                    @else

                    
                    @endif
                  
                    @if(count($Grade111subjects)>0){
                        <h3>Grade 11</h3>
                        <h5>Fist Sem</h5>
                        <table class="table table-defualt">
                                <thead>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                        @foreach($Grade111subjects as $Grade111subject)
                                    <tr>
                                        <td>{{$Grade111subject->subject}}</td>
                                        <td>{{$Grade111subject->name}}</td>
                                        <td>{{$Grade111subject->fname}} {{$Grade111subject->lname}}<td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                </tfoot>
                            </table>
                            

                    
                    @else

                    
                    @endif
                   
                    @if(count($Grade112subjects)>0){
                        <h3>Grade 11</h3>
                        <h5>Second Sem</h5>
                        <table class="table table-defualt">
                                <thead>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                        @foreach($Grade112subjects as $Grade112subject)
                                    <tr>
                                        <td>{{$Grade112subject->subject}}</td>
                                        <td>{{$Grade112subject->name}}</td>
                                        <td>{{$Grade112subject->fname}} {{$Grade112subject->lname}}<td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                </tfoot>
                            </table>
                            

                    
                    @else

                    
                    @endif
                   
                    @if(count($Grade121subjects)>0)
                    <h3>Grade 12</h3>
                    <h5>Fist Sem</h5>
                        <table class="table table-defualt">
                                <thead>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                        @foreach($Grade121subjects as $Grade121subject)
                                    <tr>
                                        <td>{{$Grade121subject->subject}}</td>
                                        <td>{{$Grade121subject->name}}</td>
                                        <td>{{$Grade121subject->fname}} {{$Grade121subject->lname}}<td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                </tfoot>
                            </table>
                            

                    
                    @else

                    
                    @endif
                   
                    @if(count($Grade122subjects)>0){
                        <h3>Grade 12</h3>
                        <h5>Second Sem</h5>
                        <table class="table table-defualt">
                                <thead>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                        @foreach($Grade122subjects as $Grade122subject)
                                    <tr>
                                        <td>{{$Grade122subject->subject}}</td>
                                        <td>{{$Grade122subject->name}}</td>
                                        <td>{{$Grade122subject->fname}} {{$Grade122subject->lname}}<td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Enrolled Subject</th>
                                        <th>Section</th>
                                        <th>Teacher</th>
                                    </tr>
                                </tfoot>
                            </table>
                            

                    
                    @else

                    
                    @endif




                    
                    
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection