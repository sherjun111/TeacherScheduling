
<?php $__env->startSection('pageTittle',isset($pageTittle) ? $pageTittle : 'AddSubject'); ?>
<?php $__env->startSection('content'); ?>
<div>
    <div class="row">
        <div class="col-md-12">
             <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                          <div class="pull-right">
                            <form action="<?php echo e(route('student.enroll.edit-product')); ?>" method="GET" class="form-inline">
                                <select name="year_level" class="form-control mr-2">
                                    <option value="">Select Year Level</option>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="4">4th Year</option>
                                </select>
                                <select name="block" class="form-control mr-2">
                                    <option value="">Select Block</option>
                                    <option value="A">Block A</option>
                                    <option value="B">Block B</option>
                                    <option value="C">Block C</option>
                                </select>
                                <select name="day" class="form-control mr-2">
                                    <option value="">Select Day</option>
                                    <option value="MTH">Monday & Thurday</option>
                                    <option value="TF">Tuesday & Friday</option>
                                    <option value="Wednesday">Wednesday</option>                                    
                                    <option value="S">Saturday</option>
                                </select>
                                <input type="time" name="time" class="form-control mr-2">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                        </div>
                    </div>

                        <div class="table-responsive mt-4">
                            <table class="table table-borderless table-striped">
                            <thead class="bg-secondary text-blue">
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Block</th>
                                    <th>Days</th>
                                    <th>Year Level</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="sortable_categories">
                                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if(
                                            (!request('year_level') || $item->year_level == request('year_level')) &&
                                            (!request('block') || $item->subject_block == request('block')) &&
                                            (!request('day') || $item->subject_day == request('day')) &&
                                            (!request('time') || $item->subject_time >= request('time'))
                                        ): ?>
                                            <tr data-index="<?php echo e($item->id); ?>" data-ordering="<?php echo e($item->booking); ?>">
                                                <td><?php echo e($item->subject_code); ?></td>
                                                <td><?php echo e($item->subject_name); ?></td>
                                                <td><?php echo e($item->subject_time); ?></td>
                                                <td><?php echo e($item->subject_room); ?></td>
                                                <td><?php echo e($item->subject_block); ?></td>
                                                <td><?php echo e($item->subject_day); ?></td>
                                                <td><?php echo e($item->year_level); ?></td>
                                                <td>
                                                 
                                                <button type="sumbit" class="btn btn-info btn-sm btn-flat mr-1 add-subject" 
                                                            data-id="<?php echo e($item->id); ?>"
                                                            data-code="<?php echo e($item->subject_code); ?>"
                                                            data-name="<?php echo e($item->subject_name); ?>"
                                                            data-time="<?php echo e($item->subject_time); ?>"
                                                            data-room="<?php echo e($item->subject_room); ?>"
                                                            data-block="<?php echo e($item->subject_block); ?>"
                                                            data-day="<?php echo e($item->subject_day); ?>"
                                                            data-year="<?php echo e($item->year_level); ?>"
                                                            title="Add Subject">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                        
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="8">
                                                <span class="text-danger">No subjects found!</span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                 </div>
                         </table>
                   
        </div>
        <?php if (isset($component)) { $__componentOriginalec1e920844a655da23f15e0530a06cad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec1e920844a655da23f15e0530a06cad = $attributes; } ?>
<?php $component = App\View\Components\Alert\FormAlert::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert.form-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Alert\FormAlert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec1e920844a655da23f15e0530a06cad)): ?>
<?php $attributes = $__attributesOriginalec1e920844a655da23f15e0530a06cad; ?>
<?php unset($__attributesOriginalec1e920844a655da23f15e0530a06cad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec1e920844a655da23f15e0530a06cad)): ?>
<?php $component = $__componentOriginalec1e920844a655da23f15e0530a06cad; ?>
<?php unset($__componentOriginalec1e920844a655da23f15e0530a06cad); ?>
<?php endif; ?>
        <h4 class="h4 text-blue mt-5">Selected Subjects</h4>
       <form action="<?php echo e(route('student.enroll.save-enrollment')); ?>" method="POST">
<div class="table-responsive mt-4">
    <table class="table table-borderless table-striped" id="selected-subjects-table">
        <thead class="bg-secondary text-blue">
            <tr>
                <th>Subject Code</th>
                <th>Description</th>
                <th>Time</th>
                <th>Room</th>
                <th>Block</th>
                <th>Days</th>
                <th>Year Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="selected-subjects-body">
            <!-- Selected subjects will be added here dynamically -->
        </tbody>
    </table>
</div>
<?php echo csrf_field(); ?>
 <?php if (isset($component)) { $__componentOriginalec1e920844a655da23f15e0530a06cad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec1e920844a655da23f15e0530a06cad = $attributes; } ?>
<?php $component = App\View\Components\Alert\FormAlert::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert.form-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Alert\FormAlert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec1e920844a655da23f15e0530a06cad)): ?>
<?php $attributes = $__attributesOriginalec1e920844a655da23f15e0530a06cad; ?>
<?php unset($__attributesOriginalec1e920844a655da23f15e0530a06cad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec1e920844a655da23f15e0530a06cad)): ?>
<?php $component = $__componentOriginalec1e920844a655da23f15e0530a06cad; ?>
<?php unset($__componentOriginalec1e920844a655da23f15e0530a06cad); ?>
<?php endif; ?>
<input type="hidden" id="selected-subjects-input" name="selected_subjects" value="">
<button type="sumbit"id="save-enrollment" class="btn btn-primary mt-3">Save Enrollment</button>
     </div>        
</div>
                                      
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var selectedSubjects = [];

    // Load previously selected subjects from local storage
    var storedSubjects = localStorage.getItem('selectedSubjects');
    if (storedSubjects) {
        selectedSubjects = JSON.parse(storedSubjects);
        renderSelectedSubjects();
    }

    $('.add-subject').click(function() {
        var button = $(this);
        var subjectId = button.data('id');
        var subjectCode = button.data('code');
        var subjectName = button.data('name');
        var subjectTime = button.data('time');
        var subjectRoom = button.data('room');
        var subjectBlock = button.data('block');
        var subjectDay = button.data('day');
        var subjectYear = button.data('year');

        // Check for conflicts
        var conflict = checkConflict(subjectDay, subjectTime, subjectCode, selectedSubjects);

        if (conflict) {
            alert('Conflict!.. Alert..This subject conflicts either Same. Time or Day & SubjectCode.');
            return;
        }

        // If no conflict, add the subject to the selected subjects array
        var newSubject = {
            id: subjectId,
            code: subjectCode,
            name: subjectName,
            time: subjectTime,
            room: subjectRoom,
            block: subjectBlock,
            day: subjectDay,
            year: subjectYear
        };

        selectedSubjects.push(newSubject);
        renderSelectedSubjects();
        saveSelectedSubjects();
    });

    // Remove subject from selected subjects
    $(document).on('click', '.remove-subject', function() {
        var subjectId = $(this).data('id');
        selectedSubjects = selectedSubjects.filter(function(subject) {
            return subject.id != subjectId;
        });
        renderSelectedSubjects();
        saveSelectedSubjects();
    });
function renderSelectedSubjects() {
    var tbody = $('#selected-subjects-body');
    tbody.empty();
    selectedSubjects.forEach(function(subject) {
        var row = '<tr>' +
            '<td>' + subject.code + '</td>' +
            '<td>' + subject.name + '</td>' +
            '<td>' + subject.time + '</td>' +
            '<td>' + subject.room + '</td>' +
            '<td>' + subject.block + '</td>' +
            '<td>' + subject.day + '</td>' +
            '<td>' + subject.year + '</td>' +
            '<td><button class="btn btn-danger btn-sm remove-subject" data-id="' + subject.id + '">Remove</button></td>' +
            '</tr>';
        tbody.append(row);
    });
    $('#selected-subjects-input').val(JSON.stringify(selectedSubjects));
}
function saveSelectedSubjects() {
        localStorage.setItem('selectedSubjects', JSON.stringify(selectedSubjects));
    }

// Add this new function to save the enrollment
function saveEnrollment() {
    if (selectedSubjects.length === 0) {
        alert('Please select at least one subject before saving.');
        return;
    }

    // Validate and prepare the subjects data
    var validSubjects = selectedSubjects.map(function(subject) {
        return {
            id: subject.id,
            code: subject.code,
            name: subject.name,
            time: subject.time,
            room: subject.room,
            block: subject.block,
            day: subject.day,
            year: parseInt(subject.year) || null // Convert to integer or null if invalid
        };
    });

    $.ajax({
        url: '<?php echo e(route("student.enroll.save-enrollment")); ?>',
        method: 'POST',
        data: {
            subjects: JSON.stringify(validSubjects),
            _token: '<?php echo e(csrf_token()); ?>'
        },
        dataType: 'json',
        success: function(response) {
            alert(response.message);
            // Clear local storage and selected subjects
            localStorage.removeItem('selectedSubjects');
            selectedSubjects = [];
            renderSelectedSubjects();
        },
        error: function(xhr) {
            alert('Error saving enrollment: ' + (xhr.responseJSON ? xhr.responseJSON.message : 'Unknown error'));
        }
    });
}

// Modify the click event for the save button
$('#save-enrollment').click(function(e) {
    e.preventDefault();
    saveEnrollment();
});


    function checkConflict(newDay, newTime, newCode) {
        return selectedSubjects.some(function(subject) {
            return (subject.day === newDay && subject.time === newTime) || subject.code === newCode;
        });
    }

    
});
</script>  
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/pages/student/edit-product.blade.php ENDPATH**/ ?>