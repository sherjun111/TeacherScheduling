<div>
<div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box height-100-p">
                <div class="profile-photo">
                    <a href="javascript:;" onclick="event.preventDefault();document.getElementById('studentProfilePictureFile').click();" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                      <input type="file" name="studentProfilePictureFile" id="studentProfilePictureFile" class="d-none" style="opacity: 0">
                      <img src="{{ $student->picture }}" alt="" class="avatar-photo" id="studentProfilePicture">
                </div>
                <h5 class="text-center h5 mb-0">{{ $student->name }}</h5>
                <p class="text-center text-muted font-14">
                    {{ $student->email }}
                </p>

            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a wire:click.prevent='selectTab("personal_details")' class="nav-link {{ $tab == 'personal_details' ? 'active' : '' }}" data-toggle="tab" href="#personal_details" role="tab">Personal Details</a>
                            </li>
                            <li class="nav-item">
                                <a wire:click.prevent='selectTab("update_password")' class="nav-link {{ $tab == 'update_password' ? 'active' : '' }}" data-toggle="tab" href="#update_password" role="tab">Update Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Timeline Tab start -->
                            <div class="tab-pane fade {{ $tab == 'personal_details' ? 'active show' : '' }}" id="personal_details" role="tabpanel">
                                <div class="pd-20">
                                    <form wire:submit='updateStudentPersonalDetails()'>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Full name</label>
                                                    <input type="text" class="form-control" placeholder="Enter full name" wire:model.live='name'>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Email</label>
                                                    <input type="text" class="form-control" placeholder="Enter email" wire:model.live='email'>
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Username</label>
                                                    <input type="text" class="form-control" placeholder="Enter username" wire:model.live='username'>
                                                    @error('username')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Phone</label>
                                                    <input type="text" class="form-control" placeholder="Enter phone number" wire:model.live='phone'>
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>course</label>
                                                    <input type="text" class="form-control" placeholder="Course" wire:model.live='course'>
                                                    @error('course')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >age</label>
                                                    <input type="text" class="form-control" placeholder="Age" wire:model.live='age'>
                                                    @error('age')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >birthday</label>
                                                    <input type="text" class="form-control" placeholder="birthday" wire:model.live='birthday'>
                                                    @error('birthday')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >studentid</label>
                                                    <input type="text" class="form-control" placeholder="studentid#" wire:model.live='studentid' disabled>
                                                    @error('studentid')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label >Address</label>
                                                    <input type="text" class="form-control" placeholder="Enter address" wire:model.live='address'>
                                                    @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Timeline Tab End -->
                            <!-- Tasks Tab start -->
                            <div class="tab-pane fade {{ $tab == 'update_password' ? 'active show' : '' }}" id="update_password" role="tabpanel">
                                <div class="pd-20 profile-task-wrap">
                                    <form wire:submit='updatePassword()'>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Current password</label>
                                                    <input type="password" class="form-control" placeholder="Enter current password" wire:model='current_password'>
                                                    @error('current_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >New password</label>
                                                    <input type="password" class="form-control" placeholder="Enter new password" wire:model='new_password'>
                                                    @error('new_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Confirm new password</label>
                                                    <input type="password" class="form-control" placeholder="Retype new password" wire:model='new_password_confirmation'>
                                                    @error('new_password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update password</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Tasks Tab End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
