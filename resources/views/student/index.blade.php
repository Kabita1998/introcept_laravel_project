
<h1> Index Page</h1>

<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="test_datatable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>S.N</th>
										<th>Name</th>
										<th>Gender</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Address</th>
										<th>Nationality</th>
										<th>Date of birth</th>
										<th>Education background</th>
										<th>Actions </th>
									</tr>
											</thead>
											<tbody>
											@foreach($students as $student)
											<tr>
									<td>{{$loop->index + 1}}</td>
									<td>{{$student->name}}</td>
									<td>{{$student->gender}}</td>
									<td>{{$student->email}}</td>
									<td>{{$student->phone}}</td>
									<td>{{$student->address}}</td>
									<td>{{$student->nationality}}</td>
									<td>{{$student->dob}}</td>
									<td>{{$student->education_background}}</td>
								</tr>
							@endforeach
							</tbody>
							</table>
						</div>
					</div>
				</div>


			</main>



			