<!DOCTYPE html>
<html lang="en">
<head>
    <title>Learner Progress</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #ebe7e7;
            min-height: 100vh;
        }
        footer {
            background-color: #0f71c7;
            color: #fff;
            padding: 1rem;
        }
    </style>
</head>
<body>

<!-- Main Container -->
<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <aside class="col-md-3 col-lg-2 sidebar p-4">
            <h5 class="mb-4">Filters</h5>

            <form method="GET" class="d-grid gap-3">
                <div>
                    <label class="form-label">Course</label>
                    <select name="course" class="form-select">
                        <option value="">All Courses</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->name }}"
                                {{ $selectedCourse === $course->name ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="form-label">Sort by Progress</label>
                    <select name="sort" class="form-select">
                        <option value="">None</option>
                        <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>Ascending</option>
                        <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>Descending</option>
                    </select>
                </div>

                <div>
                <label class="form-label">Limit</label>
                <select name="limit" class="form-select">
                    @foreach ([5, 10, 25, 50, 100] as $value)
                        <option value="{{ $value }}"
                            {{ request('limit', 10) == $value ? 'selected' : '' }}>
                            {{ $value }} records
                        </option>
                    @endforeach
                </select>
              </div>

            <div>
                <label class="form-label">Offset</label>
                <input
                    type="number"
                    name="offset"
                    min="0"
                    value="{{ request('offset', 0) }}"
                    class="form-control"
                    placeholder="0"
                >
            </div>

                <button type="submit" class="btn btn-primary">
                    Apply Filters
                </button>
            </form>
        </aside>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 p-4">
            <h1 class="mb-4">Learner Progress</h1>

            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Learner</th>
                            <th>Course</th>
                            <th>Progress (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->learner->firstname }} {{ $enrollment->learner->lastname }}</td>
                                <td>{{ $enrollment->course->name }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar"
                                             role="progressbar"
                                             style="width: {{ $enrollment->progress }}%;">
                                            {{ $enrollment->progress }}%
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<!-- Footer -->
<footer class="text-center">
    <p class="mb-0">Footer Text</p>
</footer>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
