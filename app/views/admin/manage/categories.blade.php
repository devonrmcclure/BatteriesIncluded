@extends('layouts.admin')

@section('title')
    Batteries Included - Manage categories
@stop

@section('content')

    <div class="content-card col-md-10 col-md-offset-1">
        <table class="material-table">
          	<tr>
    	        <th>Category</th>
    	        <th>Parent Category</th>
    	        <th>Created</th>
    	        <th>Manage</th>
          	</tr>
    	    @foreach($categories as $category)
				<tr class="test">
				  	<td>{{$category->category_name}}</td>
                    <td>
                        {{$parentCategories[$category->category_name]['parent']}}
                    </td>
                    <td>{{$category->created_at->format('F j, Y')}}</td>
				  	<td>
                        <span class="ripple-effect material-flat-button material-flat-add"><a href="/admin/categories/create">add</a></span>
				  		<span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/categories/{{$category->id}}/edit">edit</a></span>
					</td>
				</tr>
    	    @endforeach
        </table>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body"></div>
                    <div class="modal-footer">

                        <span class="ripple-effect material-flat-button material-flat-delete"><a href="#" class="confirmDelete">delete</a></span>
                        <span class="ripple-effect material-flat-button material-flat-edit"><a href="#" data-dismiss="modal" class="cancelDelete">Cancel</a></span>
                    </div>
                </div>
            </div>
        </div>
            TODO: <br />
            - List categories <br />
            - Allow editing/delete of categories inline (LATER TOTO: AJAX search function to search for specific categories to manage) <br />
            - Popup modal to add a category (alternatively, a form pops up on the page to add)
    </div>

@stop