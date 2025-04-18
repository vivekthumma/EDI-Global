@extends('masterlayout.masteradmin')
@section('title', 'University Details')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="content-wrapper">
  <div class="table-container">
    <div class="d-flex justify-content-between mb-3">
      <h2>University Details</h2>
      <button class="add-btn" data-bs-toggle="modal" data-bs-target="#addDetailsModal"><i class="fa fa-plus"></i></button>
    </div>

    <table class="table table-bordered text-center align-middle">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>University</th>
          <th>Offer</th>
          <th>Rating</th>
          <th>Short Content</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($universityDetails as $index => $detail)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $detail->university_name ?? "-" }}</td>
          <td>{{ $detail->offer }}</td>
          <td>{{ $detail->rating }}</td>
          <td>{{ Str::limit($detail->short_content, 50) }}</td>
          <td>
            <span class="status {{ $detail->status == 0 ? 'active' : 'inactive' }}">
              {{ $detail->status == 0 ? 'Active' : 'Deactive' }}
            </span>
          </td>
          <td>
            <button class="edit" 
                    data-id="{{ $detail->id }}"
                    data-university-id="{{ $detail->university_id }}"
                    data-offer="{{ $detail->offer }}"
                    data-rating="{{ $detail->rating }}"
                    data-short-content="{{ $detail->short_content }}"
                    data-status="{{ $detail->status }}"
                    data-bs-toggle="modal" data-bs-target="#editDetailsModal">
              <i class="fa fa-pen"></i>
            </button>
            <button class="delete" 
                    data-id="{{ $detail->id }}" 
                    data-bs-toggle="modal" data-bs-target="#deleteDetailsModal">
              <i class="fa fa-trash"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

 <!-- Add Details Modal -->
<div class="modal fade" id="addDetailsModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Add University Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="addDetailsForm" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-body row g-3">
                  <div class="col-md-6">
                      <label class="form-label">University</label>
                      <select class="form-select" name="university_id" required>
                          <option value="">Select University</option>
                          @foreach ($universities as $uni)
                              <option value="{{ $uni->id }}">{{ $uni->name }}</option>
                          @endforeach
                      </select>
                      <div class="invalid-feedback university_id-error"></div>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Offer Name</label>
                      <input class="form-control" name="offer_name" placeholder="Offer Name" required>
                      <div class="invalid-feedback offer_name-error"></div>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Rating</label>
                      <input type="number" class="form-control" name="rating" placeholder="Rating" min="0" max="5" step="0.1">
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Short Content</label>
                      <textarea class="form-control" name="short_content" placeholder="Short Content"></textarea>
                  </div>
                  <div class="col-md-12">
                      <label class="form-label">About University</label>
                      <textarea class="form-control" name="about" placeholder="About University" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Jobs & Internships</label>
                      <textarea class="form-control" name="jobs_internships" placeholder="Jobs & Internships" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Sample Certificate</label>
                      <textarea class="form-control" name="sample_certificate" placeholder="Sample Certificate" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Education Loan EMI</label>
                      <textarea class="form-control" name="education_loan_emi" placeholder="Education Loan EMI" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Admission Process</label>
                      <textarea class="form-control" name="admission_process" placeholder="Admission Process" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Exam Pattern</label>
                      <textarea class="form-control" name="exam_pattern" placeholder="Exam Pattern" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Placement</label>
                      <textarea class="form-control" name="placement" placeholder="Placement" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Summary</label>
                      <textarea class="form-control" name="summary" placeholder="Summary" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Meta Description</label>
                      <textarea class="form-control" name="meta_description" placeholder="Meta Description" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Meta Title</label>
                      <input class="form-control" name="meta_title" placeholder="Meta Title">
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Prospect File</label>
                      <input class="form-control" type="file" name="university_prospect_file">
                      <small class="text-muted">PDF, DOC, DOCX (Max: 2MB)</small>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Status</label>
                      <select class="form-select" name="status">
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                      </select>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save Details</button>
              </div>
          </form>
      </div>
  </div>
</div>


 <!-- Edit Details Modal -->
<div class="modal fade" id="editDetailsModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Edit University Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editDetailsForm" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <input type="hidden" name="id" id="edit-id">
              <div class="modal-body row g-3">
                  <div class="col-md-6">
                      <label class="form-label">University</label>
                      <select class="form-select" name="university_id" id="edit-university-id" required>
                          <option value="">Select University</option>
                          @foreach ($universities as $uni)
                              <option value="{{ $uni->id }}">{{ $uni->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Offer Name</label>
                      <input class="form-control" name="offer_name" id="edit-offer-name" placeholder="Offer Name" required>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Rating</label>
                      <input type="number" class="form-control" name="rating" id="edit-rating" placeholder="Rating" min="0" max="5" step="0.1">
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Short Content</label>
                      <textarea class="form-control" name="short_content" id="edit-short-content" placeholder="Short Content"></textarea>
                  </div>
                  <div class="col-md-12">
                      <label class="form-label">About University</label>
                      <textarea class="form-control" name="about" id="edit-about" placeholder="About University" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Jobs & Internships</label>
                      <textarea class="form-control" name="jobs_internships" id="edit-jobs-internships" placeholder="Jobs & Internships" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Sample Certificate</label>
                      <textarea class="form-control" name="sample_certificate" id="edit-sample-certificate" placeholder="Sample Certificate" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Education Loan EMI</label>
                      <textarea class="form-control" name="education_loan_emi" id="edit-education-loan-emi" placeholder="Education Loan EMI" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Admission Process</label>
                      <textarea class="form-control" name="admission_process" id="edit-admission-process" placeholder="Admission Process" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Exam Pattern</label>
                      <textarea class="form-control" name="exam_pattern" id="edit-exam-pattern" placeholder="Exam Pattern" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Placement</label>
                      <textarea class="form-control" name="placement" id="edit-placement" placeholder="Placement" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Summary</label>
                      <textarea class="form-control" name="summary" id="edit-summary" placeholder="Summary" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Meta Description</label>
                      <textarea class="form-control" name="meta_description" id="edit-meta-description" placeholder="Meta Description" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Meta Title</label>
                      <input class="form-control" name="meta_title" id="edit-meta-title" placeholder="Meta Title">
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Prospect File</label>
                      <input class="form-control" type="file" name="university_prospect_file">
                      <small class="text-muted">Current file: <span id="current-prospect-file"></span></small>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Status</label>
                      <select class="form-select" name="status" id="edit-status">
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>
                      </select>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update Details</button>
              </div>
          </form>
      </div>
  </div>
</div>

  <!-- Delete Details Modal -->
<div class="modal fade" id="deleteDetailsModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Delete University Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="deleteDetailsForm" method="POST">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" id="delete-id">
              <div class="modal-body">
                  <p>Are you sure you want to delete these university details? This action cannot be undone.</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger">Delete</button>
              </div>
          </form>
      </div>
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize Toastr
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": 5000
    };

    // Handle edit button click to populate modal
    $('.edit').click(function() {
        const detailId = $(this).data('id');
        $('#edit-id').val(detailId);
        $('#edit-university-id').val($(this).data('university-id'));
        $('#edit-offer-name').val($(this).data('offer'));
        $('#edit-rating').val($(this).data('rating'));
        $('#edit-short-content').val($(this).data('short-content'));
        $('#edit-about').val($(this).data('about'));
        $('#edit-jobs-internships').val($(this).data('jobs-internships'));
        $('#edit-sample-certificate').val($(this).data('sample-certificate'));
        $('#edit-education-loan-emi').val($(this).data('education-loan-emi'));
        $('#edit-admission-process').val($(this).data('admission-process'));
        $('#edit-exam-pattern').val($(this).data('exam-pattern'));
        $('#edit-placement').val($(this).data('placement'));
        $('#edit-summary').val($(this).data('summary'));
        $('#edit-meta-description').val($(this).data('meta-description'));
        $('#edit-meta-title').val($(this).data('meta-title'));
        $('#edit-status').val($(this).data('status'));
    });

    // Handle delete button click
    $('.delete').click(function() {
        const detailId = $(this).data('id');
        $('#delete-id').val(detailId);
    });

    // AJAX form submission for adding details
    $('#addDetailsForm').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        
        $.ajax({
            url: "{{ route('universities.details.store') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#addDetailsModal').modal('hide');
                toastr.success(response.message);
                setTimeout(() => {
                    location.reload();
                }, 1500);
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    // Validation errors
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('[name="' + key + '"]').addClass('is-invalid');
                        $('.' + key + '-error').text(value[0]);
                    });
                } else {
                    toastr.error('An error occurred while adding details.');
                }
            }
        });
    });

    // AJAX form submission for editing details
    $('#editDetailsForm').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        var detailId = $('#edit-id').val();
        
        $.ajax({
            url: "{{ route('universities.details.update', '') }}/" + detailId,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#editDetailsModal').modal('hide');
                toastr.success(response.message);
                setTimeout(() => {
                    location.reload();
                }, 1500);
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    toastr.error(xhr.responseJSON.message);
                } else {
                    toastr.error('An error occurred while updating details.');
                }
            }
        });
    });

    // AJAX form submission for deleting details
    $('#deleteDetailsForm').submit(function(e) {
        e.preventDefault();
        
        var formData = $(this).serialize();
        var detailId = $('#delete-id').val();
        
        $.ajax({
            url: "{{ route('universities.details.delete', '') }}/" + detailId,
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#deleteDetailsModal').modal('hide');
                toastr.success(response.message);
                setTimeout(() => {
                    location.reload();
                }, 1500);
            },
            error: function(xhr) {
                toastr.error('An error occurred while deleting details.');
            }
        });
    });

    // Clear validation errors when modals are closed
    $('.modal').on('hidden.bs.modal', function() {
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').text('');
    });
});
</script>
@endsection
