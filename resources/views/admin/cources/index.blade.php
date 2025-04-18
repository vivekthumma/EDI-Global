@extends('masterlayout.masteradmin')
@section('title','Cources')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<div class="content-wrapper">
    <div class="container mt-5">
        <div class="card table-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">Cources</h4>
                    <button class="btn btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#addModal">
                      <i class="fas fa-plus"></i>
                    </button>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Sr. NO</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Duration</th>
                                <th>Program</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cources as $index => $cource)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($cource->image)
                                            <img src="{{ asset($cource->image) }}" alt="Image" width="60" height="60">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $cource->cource_name }}</td>
                                    <td>{{ $cource->slug }}</td>
                                    <td>{{ $cource->duration }}</td>
                                    <td>{{ $cource->program ? $cource->program->name : 'N/A' }}</td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-success btn-sm btn-action me-1 editBtn"
                                            data-id="{{ $cource->id }}"
                                            data-category_id="{{ $cource->category_id }}"
                                            data-program_id="{{ $cource->program_id }}"
                                            data-cource_name="{{ $cource->cource_name }}"
                                            data-short_name="{{ $cource->short_name }}"
                                            data-slug="{{ $cource->slug }}"
                                            data-duration="{{ $cource->duration }}"
                                            data-fees="{{ $cource->fees }}"
                                            data-eligibility="{{ $cource->eligibility }}"
                                            data-image="{{ asset($cource->image) }}"
                                            data-brochure="{{ asset($cource->brochure) }}"
                                            data-icon="{{ asset($cource->icon) }}"
                                            data-meta_title="{{ $cource->meta_title }}"
                                            data-meta_description="{{ $cource->meta_description }}"
                                            data-short_content="{{ $cource->short_content }}"
                                            data-about="{{ $cource->about }}"
                                            data-key_highlights="{{ $cource->key_highlights }}"
                                            data-subject_syllabus="{{ $cource->subject_syllabus }}"
                                            data-eligibility_duration="{{ $cource->eligibility_duration }}"
                                            data-program_fee="{{ $cource->program_fee }}"
                                            data-admission_process="{{ $cource->admission_process }}"
                                            data-course_specialization="{{ $cource->course_specialization }}"
                                            data-education_loan="{{ $cource->education_loan }}"
                                            data-worth_it="{{ $cource->worth_it }}"
                                            data-carrier_scope="{{ $cource->carrier_scope }}"
                                            data-action="{{ route('cources.update.manual', $cource->id) }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger btn-action"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-id="{{ $cource->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade " id="addModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <form action="{{ route('cources.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Cource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="form_type" value="add">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Program</label><span class="text-danger">*</span>
                                <select name="program_id" class="form-select mb-2">
                                    <option value="">-- Select Program --</option>
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Category</label><span class="text-danger">*</span>
                                <select name="category_id" class="form-select mb-2">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Cource Name</label><span class="text-danger">*</span>
                                <input type="text" name="cource_name" class="form-control mb-2" placeholder="Cource Name" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Short Name</label><span class="text-danger">*</span>
                                <input type="text" name="short_name" class="form-control mb-2" placeholder="Short Name" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Slug</label><span class="text-danger">*</span>
                                <input type="text" name="slug" class="form-control mb-2" placeholder="Slug" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Duration</label><span class="text-danger">*</span>
                                <input type="text" name="duration" class="form-control mb-2" placeholder="Duration" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Fees</label><span class="text-danger">*</span>
                                <input type="text" name="fees" class="form-control mb-2" placeholder="Fees" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Eligibility</label><span class="text-danger">*</span>
                                <input type="text" name="eligibility" class="form-control mb-2" placeholder="eligibility" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Image</label><span class="text-danger">*</span>
                                <input type="file" name="image" class="form-control mb-2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Brochure</label><span class="text-danger">*</span>
                                <input type="file" name="brochure" class="form-control mb-2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Icon</label><span class="text-danger">*</span>
                                <input type="file" name="icon" class="form-control mb-2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Meta Title</label><span class="text-danger">*</span>
                                <input type="text" name="meta_title" class="form-control mb-2" placeholder="Meta Title" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Meta Description</label><span class="text-danger">*</span>
                                <textarea name="meta_description" class="form-control mb-2" rows="2" placeholder="Meta Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Short Content</label><span class="text-danger">*</span>
                                <textarea name="short_content" class="form-control mb-2" rows="2" placeholder="Short Content"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Ck Editor --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">About</label><span class="text-danger">*</span>
                                <textarea name="about" id="addAbout" class="form-control ckeditor mb-2" rows="2" placeholder="About"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Key Highlights</label><span class="text-danger">*</span>
                                <textarea name="key_highlights" class="form-control ckeditor mb-2" rows="2" placeholder="Key Highlights"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Subject / Syllabus</label><span class="text-danger">*</span>
                                <textarea name="subject_syllabus" class="form-control ckeditor mb-2" rows="2" placeholder="Subject / Syllabus"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Eligibility Duration</label><span class="text-danger">*</span>
                                <textarea name="eligibility_duration" class="form-control ckeditor mb-2" rows="2" placeholder="Eligibility Duration"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Program Fee</label><span class="text-danger">*</span>
                                <textarea name="program_fee" class="form-control ckeditor mb-2" rows="2" placeholder="Program Fee"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Admission Process</label><span class="text-danger">*</span>
                                <textarea name="admission_process" class="form-control ckeditor mb-2" rows="2" placeholder="Admission Process"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Course Specialization</label><span class="text-danger">*</span>
                                <textarea name="course_specialization" class="form-control ckeditor mb-2" rows="2" placeholder="Course Specialization"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Education Loan/EMI</label><span class="text-danger">*</span>
                                <textarea name="education_loan" class="form-control ckeditor mb-2" rows="2" placeholder="Education Loan/EMI"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Worth It</label><span class="text-danger">*</span>
                                <textarea name="worth_it" class="form-control ckeditor mb-2" rows="2" placeholder="Worth It"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Carrier Scope</label><span class="text-danger">*</span>
                                <textarea name="carrier_scope" class="form-control ckeditor mb-2" rows="2" placeholder="Carrier Scope"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
          </form>
      </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form method="POST" id="editForm" enctype="multipart/form-data" class="modal-content">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Edit Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="id" id="editId">
                    <input type="hidden" name="form_type" value="edit">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Program</label><span class="text-danger">*</span>
                                <select name="program_id" id="editProgramId" class="form-select">
                                    @foreach($programs as $program)
                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Category</label><span class="text-danger">*</span>
                                <select name="category_id" id="editCategoryId" class="form-select mb-2">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Cource Name</label><span class="text-danger">*</span>
                                <input type="text" id="editCourceName" name="cource_name" class="form-control mb-2" placeholder="Cource Name" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Short Name</label><span class="text-danger">*</span>
                                <input type="text" id="editShortName" name="short_name" class="form-control mb-2" placeholder="Short Name" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Slug</label><span class="text-danger">*</span>
                                <input type="text" id="editSlug" name="slug" class="form-control mb-2" placeholder="Slug" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Duration</label><span class="text-danger">*</span>
                                <input type="text" id="editDuration" name="duration" class="form-control mb-2" placeholder="Duration" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Fees</label><span class="text-danger">*</span>
                                <input type="text" id="editFees" name="fees" class="form-control mb-2" placeholder="Fees" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Eligibility</label><span class="text-danger">*</span>
                                <input type="text" id="editEligibility" name="eligibility" class="form-control mb-2" placeholder="eligibility" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control mb-2">
                                <img id="editImagePreview" src="" class="mt-2" width="60" height="60" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Brochure</label>
                                <input type="file" name="brochure" class="form-control mb-2">
                                <img id="editBrochurePreview" src="" class="mt-2" width="60" height="60" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Icon</label>
                                <input type="file" name="icon" class="form-control mb-2">
                                <img id="editIconPreview" src="" class="mt-2" width="60" height="60" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Meta Title</label><span class="text-danger">*</span>
                                <input type="text" id="editMetaTitle" name="meta_title" class="form-control mb-2" placeholder="Meta Title" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Meta Description</label><span class="text-danger">*</span>
                                <textarea name="meta_description" id="editMetaDescription" class="form-control mb-2" rows="2" placeholder="Meta Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Short Content</label><span class="text-danger">*</span>
                                <textarea name="short_content" id="editShortContent" class="form-control  mb-2" rows="2" placeholder="Short Content"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Ck Editor --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">About</label><span class="text-danger">*</span>
                                <textarea name="about" id="editAbout" class="form-control ckeditor mb-2" rows="2" placeholder="About"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Key Highlights</label><span class="text-danger">*</span>
                                <textarea name="key_highlights" id="editKeyHighlights" class="form-control ckeditor mb-2" rows="2" placeholder="Key Highlights"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Subject / Syllabus</label><span class="text-danger">*</span>
                                <textarea name="subject_syllabus" id="editSubjectSyllabus" class="form-control ckeditor mb-2" rows="2" placeholder="Subject / Syllabus"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Eligibility Duration</label><span class="text-danger">*</span>
                                <textarea name="eligibility_duration" id="editEligibilityDuration" class="form-control ckeditor mb-2" rows="2" placeholder="Eligibility Duration"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Program Fee</label><span class="text-danger">*</span>
                                <textarea name="program_fee" id="editProgramFee" class="form-control ckeditor mb-2" rows="2" placeholder="Program Fee"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Admission Process</label><span class="text-danger">*</span>
                                <textarea name="admission_process" id="editAdmissionProcess" class="form-control ckeditor mb-2" rows="2" placeholder="Admission Process"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Course Specialization</label><span class="text-danger">*</span>
                                <textarea name="course_specialization" id="editCourseSpecialization" class="form-control ckeditor mb-2" rows="2" placeholder="Course Specialization"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Education Loan/EMI</label><span class="text-danger">*</span>
                                <textarea name="education_loan" id="editEducationLoan" class="form-control ckeditor mb-2" rows="2" placeholder="Education Loan/EMI"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Worth It</label><span class="text-danger">*</span>
                                <textarea name="worth_it" id="editWorthIt" class="form-control ckeditor mb-2" rows="2" placeholder="Worth It"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Carrier Scope</label><span class="text-danger">*</span>
                                <textarea name="carrier_scope" id="editCarrierScope" class="form-control ckeditor mb-2" rows="2" placeholder="Carrier Scope"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>



    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteForm" method="POST" class="modal-content">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Delete Cource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Cources?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

<script>
    $(document).on('click', '.editBtn', function () {
        let button = $(this);

        $('#editId').val(button.data('id'));
        $('#editProgramId').val(button.data('program_id'));
        $('#editCategoryId').val(button.data('category_id'));
        $('#editCourceName').val(button.data('cource_name'));
        $('#editShortName').val(button.data('short_name'));
        $('#editSlug').val(button.data('slug'));
        $('#editDuration').val(button.data('duration'));
        $('#editFees').val(button.data('fees'));
        $('#editEligibility').val(button.data('eligibility'));
        $('#editMetaTitle').val(button.data('meta_title'));
        $('#editMetaDescription').val(button.data('meta_description'));
        $('#editShortContent').val(button.data('short_content'));
        $('#editAbout').val(button.data('about'));
        $('#editKeyHighlights').val(button.data('key_highlights'));
        $('#editSubjectSyllabus').val(button.data('subject_syllabus'));
        $('#editEligibilityDuration').val(button.data('eligibility_duration'));
        $('#editProgramFee').val(button.data('program_fee'));
        $('#editAdmissionProcess').val(button.data('admission_process'));
        $('#editCourseSpecialization').val(button.data('course_specialization'));
        $('#editEducationLoan').val(button.data('education_loan'));
        $('#editWorthIt').val(button.data('worth_it'));
        $('#editCarrierScope').val(button.data('carrier_scope'));
        $('#editImagePreview').attr('src', button.data('image'));
        $('#editBrochurePreview').attr('src', button.data('brochure'));
        $('#editIconPreview').attr('src', button.data('icon'));
        $('#editForm').attr('action', button.data('action'));

    });

    @if ($errors->any() && old('form_type') === 'add')
        const addModal = new bootstrap.Modal(document.getElementById('addModal'));
        addModal.show();
    @elseif ($errors->any() && old('form_type') === 'edit')
        const editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    @endif

    /*------------------------------------------
    --------------------------------------------
    Delete Js
    --------------------------------------------
    --------------------------------------------*/
    $(document).ready(function () {
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var id = button.data('id'); 
            var action = "{{ url('cources') }}/" + id;
            $('#deleteForm').attr('action', action);
        });
    });
</script>

<script>
let ckeditors = {}; // object to store multiple instances

function initAllCKEditors() {
    document.querySelectorAll('.ckeditor').forEach((el, index) => {
        const name = el.getAttribute('name');

        // Destroy if already exists
        if (ckeditors[name]) {
            ckeditors[name].destroy().then(() => {
                createEditor(el, name);
            });
        } else {
            createEditor(el, name);
        }
    });
}

$('#addModal').on('shown.bs.modal', function () {
  initCKEditorFromClass('#addModal');
});


function createEditor(el, name) {
    ClassicEditor
        .create(el)
        .then(editor => {
            ckeditors[name] = editor;
        })
        .catch(error => {
            console.error(error);
        });
}

$(document).on('click', '.editBtn', function () {
    // Set data into textareas
    $('[name="about"]').val($(this).data('about'));
    $('[name="key_highlights"]').val($(this).data('key_highlights'));
    $('[name="subject_syllabus"]').val($(this).data('subject_syllabus'));
    $('[name="eligibility_duration"]').val($(this).data('eligibility_duration'));
    $('[name="program_fee"]').val($(this).data('program_fee'));
    $('[name="course_specialization"]').val($(this).data('course_specialization'));
    $('[name="education_loan"]').val($(this).data('education_loan'));
    $('[name="worth_it"]').val($(this).data('worth_it'));
    $('[name="carrier_scope"]').val($(this).data('carrier_scope'));

    // Re-initialize CKEditor
    setTimeout(() => {
        initAllCKEditors();
    }, 200); // Delay ensures modal has shown textarea properly

    $('#editModal').modal('show');
});
</script>


@endsection