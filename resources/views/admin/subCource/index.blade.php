@extends('masterlayout.masteradmin')
@section('title','Sub Cources')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<div class="content-wrapper">
    <div class="container mt-5">
        <div class="card table-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">Sub Cource</h4>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subCources as $index => $subCource)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($subCource->image)
                                            <img src="{{ asset($subCource->image) }}" alt="Image" width="60" height="60">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $subCource->sub_cource_name }}</td>
                                    <td>{{ $subCource->slug }}</td>
                                    
                                    <td>
                                        <button type="button"
                                            class="btn btn-success btn-sm btn-action me-1 editBtn"
                                            data-id="{{ $subCource->id }}"
                                            data-cource_id="{{ $subCource->cource_id }}"
                                            data-sub_cource_name="{{ $subCource->sub_cource_name }}"
                                            data-slug="{{ $subCource->slug }}"
                                            data-image="{{ asset($subCource->image) }}"
                                            data-brochure="{{ asset($subCource->brochure) }}"
                                            data-icon="{{ asset($subCource->icon) }}"
                                            data-eligibility="{{ $subCource->eligibility }}"
                                            data-short_content="{{ $subCource->short_content }}"
                                            data-syllabus="{{ $subCource->syllabus }}"
                                            data-about="{{ $subCource->about }}"
                                            data-admission_process="{{ $subCource->admission_process }}"
                                            data-carrier_scope="{{ $subCource->carrier_scope}}"
                                            data-meta_title="{{ $subCource->meta_title}}"
                                            data-meta_description="{{ $subCource->meta_description}}"
                                            data-action="{{ route('subcOurces.update.manual', $subCource->id) }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger btn-action"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-id="{{ $subCource->id }}">
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
          <form action="{{ route('sub-co.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Sub Cource</h5>
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
                                <label class="form-label">Cources</label>
                                <select name="cource_id" class="form-select mb-2">
                                    <option value="">-- Select Cource --</option>
                                    @foreach ($cources as $cource)
                                        <option value="{{ $cource->id }}">{{ $cource->cource_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Sub Cource Name</label>
                                <input type="text" name="sub_cource_name" class="form-control mb-2" placeholder="Sub Cource Name" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Slug</label>
                                <input type="text" name="slug" class="form-control mb-2" placeholder="Slug" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control mb-2">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Icon</label>
                                <input type="file" name="icon" class="form-control mb-2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Brochure</label>
                                <input type="file" name="brochure" class="form-control mb-2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Eligibility</label>
                                <input type="text" name="eligibility" class="form-control mb-2" placeholder="eligibility" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Short Content</label>
                                <textarea name="short_content" class="form-control mb-2" rows="2" placeholder="Short Content"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Subject / Syllabus</label>
                                <textarea name="syllabus" class="form-control ckeditor mb-2" rows="2" placeholder="Syllabus"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">About</label>
                                <textarea name="about" id="addAbout" class="form-control ckeditor mb-2" rows="2" placeholder="About"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Admission Process</label>
                                <textarea name="admission_process" class="form-control ckeditor mb-2" rows="2" placeholder="Admission Process"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Carrier Scope</label>
                                <textarea name="carrier_scope" class="form-control ckeditor mb-2" rows="2" placeholder="Carrier Scope"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control mb-2" placeholder="Meta Title" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Meta Description</label>
                                <textarea name="meta_description" class="form-control mb-2" rows="2" placeholder="Meta Description"></textarea>
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
                                <label class="form-label">Cources</label>
                                <select name="cource_id" id="editCourceId" class="form-select mb-2">
                                    <option value="">-- Select Cource --</option>
                                    @foreach ($cources as $cource)
                                        <option value="{{ $cource->id }}">{{ $cource->cource_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Sub Cource Name</label>
                                <input type="text" name="sub_cource_name" id="editSubCourceName" class="form-control mb-2" placeholder="Sub Cource Name" >
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
                                <label class="form-lable">Slug</label>
                                <input type="text" name="slug" id="editSlug" class="form-control mb-2" placeholder="Slug" >
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
                                <label class="form-label">Brochure</label>
                                <input type="file" name="brochure" class="form-control mb-2">
                                <img id="editBrochurePreview" src="" class="mt-2" width="60" height="60" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Eligibility</label>
                                <input type="text" name="eligibility" id="editEligibility" class="form-control mb-2" placeholder="eligibility" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Short Content</label>
                                <textarea name="short_content" class="form-control mb-2" id="editShortContent" rows="2" placeholder="Short Content"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Subject / Syllabus</label>
                                <textarea name="syllabus" id="editSubjectSyllabus" class="form-control ckeditor mb-2" rows="2" placeholder="Syllabus"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">About</label>
                                <textarea name="about" id="editAbout" class="form-control ckeditor mb-2" rows="2" placeholder="About"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Admission Process</label>
                                <textarea name="admission_process" id="editAdmissionProcess" class="form-control ckeditor mb-2" rows="2" placeholder="Admission Process"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-lable">Carrier Scope</label>
                                <textarea name="carrier_scope" id="editCarrierScope" class="form-control ckeditor mb-2" rows="2" placeholder="Carrier Scope"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Meta Title</label>
                                <input type="text" name="meta_title" id="editMetaTitle" class="form-control mb-2" placeholder="Meta Title" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-lable">Meta Description</label>
                                <textarea name="meta_description" id="editMetaDescription" class="form-control mb-2" rows="2" placeholder="Meta Description"></textarea>
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
        $('#editCourceId').val(button.data('cource_id'));
        $('#editSubCourceName').val(button.data('sub_cource_name'));
        $('#editSlug').val(button.data('slug'));
        $('#editImagePreview').attr('src', button.data('image'));
        $('#editBrochurePreview').attr('src', button.data('brochure'));
        $('#editIconPreview').attr('src', button.data('icon'));
        $('#editEligibility').val(button.data('eligibility'));
        $('#editShortContent').val(button.data('short_content'));
        $('#editSubjectSyllabus').val(button.data('syllabus'));
        $('#editAbout').val(button.data('about'));
        $('#editAdmissionProcess').val(button.data('admission_process'));
        $('#editCarrierScope').val(button.data('carrier_scope'));
        $('#editMetaTitle').val(button.data('meta_title'));
        $('#editMetaDescription').val(button.data('meta_description'));
        
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
            var action = "{{ url('sub-co') }}/" + id;
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
    $('[name="syllabus"]').val($(this).data('syllabus'));
    $('[name="admission_process"]').val($(this).data('admission_process'));
    $('[name="carrier_scope"]').val($(this).data('carrier_scope'));

    // Re-initialize CKEditor
    setTimeout(() => {
        initAllCKEditors();
    }, 200); // Delay ensures modal has shown textarea properly

    $('#editModal').modal('show');
});
</script>


@endsection