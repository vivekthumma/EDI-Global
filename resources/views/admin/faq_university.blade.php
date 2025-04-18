<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .table-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .entries-select {
            width: 80px;
            display: inline-block;
        }
        .action-buttons .btn {
            margin-right: 5px;
        }
        .status-active {
            color: #28a745;
            font-weight: bold;
        }
        .status-inactive {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Blog</h1>
        
        <div class="table-container">
            <div class="table-header">
                <div>
                    Show 
                    <select class="form-select form-select-sm entries-select">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select> 
                    entries
                </div>
                <div class="d-flex">
                    <input type="text" class="form-control form-control-sm" placeholder="Search..." id="searchInput">
                    <button class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fas fa-plus"></i> Add New
                    </button>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>St. NO</th>
                            <th>University Name</th>
                            <th>Questions</th>
                            <th>Answer</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="blogTableBody">
                        <tr>
                            <td>1</td>
                            <td>Sewa Council of Skill & Vocational Studies</td>
                            <td>Hijhjhj</td>
                            <td>kjkdfjkdfjkfjdkj</td>
                            <td><span class="status-active">Active</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sewa Council of Skill & Vocational Studies</td>
                            <td>kdjkajdkajd</td>
                            <td>klajdkajdks</td>
                            <td><span class="status-active">Active</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-between align-items-center">
                <div>Showing 1 to 2 of 2 entries</div>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Blog Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addForm">
                        <div class="mb-3">
                            <label for="universityName" class="form-label">University Name</label>
                            <input type="text" class="form-control" id="universityName" required>
                        </div>
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <textarea class="form-control" id="question" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer</label>
                            <textarea class="form-control" id="answer" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status">
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Blog Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editId">
                        <div class="mb-3">
                            <label for="editUniversityName" class="form-label">University Name</label>
                            <input type="text" class="form-control" id="editUniversityName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editQuestion" class="form-label">Question</label>
                            <textarea class="form-control" id="editQuestion" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editAnswer" class="form-label">Answer</label>
                            <textarea class="form-control" id="editAnswer" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-select" id="editStatus">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateBtn">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this blog entry?</p>
                    <p class="fw-bold" id="deleteItemText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample data (in a real app, this would come from a server)
        let blogData = [
            {
                id: 1,
                university: "Sewa Council of Skill & Vocational Studies",
                question: "Hijhjhj",
                answer: "kjkdfjkdfjkfjdkj",
                status: "Active"
            },
            {
                id: 2,
                university: "Sewa Council of Skill & Vocational Studies",
                question: "kdjkajdkajd",
                answer: "klajdkajdks",
                status: "Active"
            }
        ];

        // DOM elements
        const blogTableBody = document.getElementById('blogTableBody');
        const searchInput = document.getElementById('searchInput');
        const entriesSelect = document.querySelector('.entries-select');
        const saveBtn = document.getElementById('saveBtn');
        const updateBtn = document.getElementById('updateBtn');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        const deleteItemText = document.getElementById('deleteItemText');

        // Initialize the table
        function renderTable(data) {
            blogTableBody.innerHTML = '';
            data.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.university}</td>
                    <td>${item.question}</td>
                    <td>${item.answer}</td>
                    <td><span class="status-${item.status.toLowerCase()}">${item.status}</span></td>
                    <td class="action-buttons">
                        <button class="btn btn-sm btn-warning edit-btn" data-id="${item.id}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="${item.id}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                blogTableBody.appendChild(row);
            });

            // Add event listeners to edit and delete buttons
            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    editBlogEntry(id);
                });
            });

            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    showDeleteConfirmation(id);
                });
            });
        }

        // Add new blog entry
        saveBtn.addEventListener('click', function() {
            const universityName = document.getElementById('universityName').value;
            const question = document.getElementById('question').value;
            const answer = document.getElementById('answer').value;
            const status = document.getElementById('status').value;

            if (universityName && question && answer) {
                const newId = blogData.length > 0 ? Math.max(...blogData.map(item => item.id)) + 1 : 1;
                const newEntry = {
                    id: newId,
                    university: universityName,
                    question: question,
                    answer: answer,
                    status: status
                };
                
                blogData.push(newEntry);
                renderTable(blogData);
                
                // Reset form and close modal
                document.getElementById('addForm').reset();
                bootstrap.Modal.getInstance(document.getElementById('addModal')).hide();
            }
        });

        // Edit blog entry
        function editBlogEntry(id) {
            const entry = blogData.find(item => item.id === id);
            if (entry) {
                document.getElementById('editId').value = entry.id;
                document.getElementById('editUniversityName').value = entry.university;
                document.getElementById('editQuestion').value = entry.question;
                document.getElementById('editAnswer').value = entry.answer;
                document.getElementById('editStatus').value = entry.status;
                
                const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();
            }
        }

        // Update blog entry
        updateBtn.addEventListener('click', function() {
            const id = parseInt(document.getElementById('editId').value);
            const universityName = document.getElementById('editUniversityName').value;
            const question = document.getElementById('editQuestion').value;
            const answer = document.getElementById('editAnswer').value;
            const status = document.getElementById('editStatus').value;

            if (id && universityName && question && answer) {
                const index = blogData.findIndex(item => item.id === id);
                if (index !== -1) {
                    blogData[index] = {
                        id: id,
                        university: universityName,
                        question: question,
                        answer: answer,
                        status: status
                    };
                    
                    renderTable(blogData);
                    bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
                }
            }
        });

        // Show delete confirmation
        function showDeleteConfirmation(id) {
            const entry = blogData.find(item => item.id === id);
            if (entry) {
                deleteItemText.textContent = `University: ${entry.university}, Question: ${entry.question.substring(0, 20)}...`;
                confirmDeleteBtn.setAttribute('data-id', id);
                
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            }
        }

        // Confirm delete
        confirmDeleteBtn.addEventListener('click', function() {
            const id = parseInt(this.getAttribute('data-id'));
            blogData = blogData.filter(item => item.id !== id);
            renderTable(blogData);
            bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
        });

        // Search functionality
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const filteredData = blogData.filter(item => 
                item.university.toLowerCase().includes(searchTerm) || 
                item.question.toLowerCase().includes(searchTerm) || 
                item.answer.toLowerCase().includes(searchTerm)
            );
            renderTable(filteredData);
        });

        // Entries per page functionality
        entriesSelect.addEventListener('change', function() {
            // In a real app, this would fetch data from server with pagination
            console.log(`Show ${this.value} entries per page`);
        });

        // Initialize the table on page load
        document.addEventListener('DOMContentLoaded', function() {
            renderTable(blogData);
        });
    </script>
</body>
</html>