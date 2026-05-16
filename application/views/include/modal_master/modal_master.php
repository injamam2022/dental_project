<?php
$CI =& get_instance();
$dontia_clinic_label = isset($CI->website['data']->company_name) ? $CI->website['data']->company_name : 'Dontia Care Clinic';
?>
<div class="modal fade dontia-appt-modal" id="dontiaAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="dontiaAppointmentModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content dontia-appt-modal__content">
            <button type="button" class="close dontia-appt-modal__close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="dontia-appt-modal__brand">
                <span class="dontia-appt-modal__logo" aria-hidden="true">DC</span>
                <span class="dontia-appt-modal__brand-text"><?php echo htmlspecialchars(strtoupper($dontia_clinic_label), ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <h2 class="dontia-appt-modal__title" id="dontiaAppointmentModalLabel">Book An Appointment</h2>
            <div id="dontiaAppointmentFormWrap">
            <form id="dontiaAppointmentForm" action="<?php echo site_url('Appointment/submit_booking'); ?>" method="post" novalidate>
                <div class="form-group">
                    <label class="sr-only" for="dontia_appt_name">Name</label>
                    <input type="text" class="form-control dontia-appt-input" id="dontia_appt_name" name="name" placeholder="Enter Your Name" autocomplete="name"/>
                    <span class="dontia-appt-field-error" role="alert" aria-live="polite"></span>
                </div>
                <div class="row dontia-appt-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="sr-only" for="dontia_appt_email">Email</label>
                            <input type="email" class="form-control dontia-appt-input" id="dontia_appt_email" name="email" placeholder="Enter Your Email id" autocomplete="email"/>
                            <span class="dontia-appt-field-error" role="alert" aria-live="polite"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="sr-only" for="dontia_appt_phone">Phone</label>
                            <input type="tel" class="form-control dontia-appt-input" id="dontia_appt_phone" name="phone" placeholder="Enter Your Phone No." autocomplete="tel"/>
                            <span class="dontia-appt-field-error" role="alert" aria-live="polite"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group dontia-appt-form-group--select">
                    <label class="sr-only" for="dontia_appt_service">Service</label>
                    <div class="dontia-appt-select-wrap">
                        <select class="form-control dontia-appt-input dontia-appt-select" id="dontia_appt_service" name="service_name">
                            <option value="">- Select Services -</option>
                            <option value="Skin Treatment">Skin Treatment</option>
                            <option value="Dental">Dental</option>
                            <option value="ENT">ENT</option>
                        </select>
                    </div>
                    <span class="dontia-appt-field-error" role="alert" aria-live="polite"></span>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="dontia_appt_date">Appointment date</label>
                    <input type="date" class="form-control dontia-appt-input" id="dontia_appt_date" name="appointment_date"/>
                    <span class="dontia-appt-field-error" role="alert" aria-live="polite"></span>
                </div>
                <div class="text-center dontia-appt-submit-wrap">
                    <button type="submit" class="btn dontia-appt-submit">Submit</button>
                </div>
            </form>
            </div>
            <div id="dontiaAppointmentSuccess" class="dontia-appt-success" aria-hidden="true">
                <p class="dontia-appt-success__text">Thank you for your booking. We will connect with you.</p>
                <button type="button" class="btn dontia-appt-submit dontia-appt-success__close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
(function ($) {
    var allowedServices = ['Skin Treatment', 'Dental', 'ENT'];

    function resetApptModalView() {
        $('#dontiaAppointmentFormWrap').show();
        $('#dontiaAppointmentModalLabel').show();
        $('#dontiaAppointmentSuccess').removeClass('is-visible').attr('aria-hidden', 'true');
    }

    function showApptSuccess() {
        $('#dontiaAppointmentFormWrap').hide();
        $('#dontiaAppointmentModalLabel').hide();
        $('#dontiaAppointmentSuccess').addClass('is-visible').attr('aria-hidden', 'false');
    }

    function clearDontiaApptErrors($form) {
        $form.find('.dontia-appt-field-error').text('');
        $form.find('.form-group').removeClass('has-error');
        $form.find('.dontia-appt-input').removeClass('input-error');
    }

    function setDontiaApptError($input, message) {
        var $fg = $input.closest('.form-group');
        $fg.addClass('has-error');
        $input.addClass('input-error');
        $fg.find('.dontia-appt-field-error').text(message);
    }

    function validateDontiaApptForm($form) {
        clearDontiaApptErrors($form);
        var ok = true;
        var name = $.trim($('#dontia_appt_name').val());
        if (!name) {
            setDontiaApptError($('#dontia_appt_name'), 'This field is required');
            ok = false;
        }
        var email = $.trim($('#dontia_appt_email').val());
        if (!email) {
            setDontiaApptError($('#dontia_appt_email'), 'This field is required');
            ok = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            setDontiaApptError($('#dontia_appt_email'), 'Please enter a valid email');
            ok = false;
        }
        var phone = $.trim($('#dontia_appt_phone').val());
        if (!phone) {
            setDontiaApptError($('#dontia_appt_phone'), 'This field is required');
            ok = false;
        } else if (phone.replace(/\D/g, '').length < 7) {
            setDontiaApptError($('#dontia_appt_phone'), 'Please enter a valid phone number');
            ok = false;
        }
        var svc = $('#dontia_appt_service').val();
        if (!svc || allowedServices.indexOf(svc) === -1) {
            setDontiaApptError($('#dontia_appt_service'), 'This field is required');
            ok = false;
        }
        var dateVal = $.trim($('#dontia_appt_date').val());
        if (!dateVal) {
            setDontiaApptError($('#dontia_appt_date'), 'This field is required');
            ok = false;
        } else {
            var d = new Date(dateVal + 'T12:00:00');
            if (isNaN(d.getTime())) {
                setDontiaApptError($('#dontia_appt_date'), 'Please choose a valid date');
                ok = false;
            } else {
                var today = new Date();
                today.setHours(0, 0, 0, 0);
                if (d < today) {
                    setDontiaApptError($('#dontia_appt_date'), 'Date cannot be in the past');
                    ok = false;
                }
            }
        }
        return ok;
    }

    $('#dontiaAppointmentForm').on('input change', '.dontia-appt-input', function () {
        var $f = $(this);
        $f.closest('.form-group').removeClass('has-error');
        $f.removeClass('input-error');
        $f.closest('.form-group').find('.dontia-appt-field-error').text('');
    });

    $('#dontiaAppointmentModal').on('show.bs.modal', function (e) {
        resetApptModalView();
        var rel = $(e.relatedTarget);
        var preset = rel.data('preselect-service');
        if (preset && allowedServices.indexOf(String(preset)) !== -1) {
            $('#dontia_appt_service').val(String(preset));
        }
    });

    $('#dontiaAppointmentModal').on('hidden.bs.modal', function () {
        var $form = $('#dontiaAppointmentForm');
        $form[0].reset();
        clearDontiaApptErrors($form);
        resetApptModalView();
    });

    $('#dontiaAppointmentForm').on('submit', function (ev) {
        ev.preventDefault();
        var $form = $(this);
        if (!validateDontiaApptForm($form)) {
            var $fe = $form.find('.input-error').first();
            if ($fe.length) {
                $fe.focus();
            }
            return;
        }
        var $btn = $form.find('button[type=submit]');
        $btn.prop('disabled', true);
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            dataType: 'json'
        }).done(function (res) {
            if (res && res.success) {
                $form[0].reset();
                clearDontiaApptErrors($form);
                showApptSuccess();
            } else {
                var msg = (res && res.message) ? res.message : 'Please check the form and try again.';
                if (typeof iziToast !== 'undefined') {
                    iziToast.error({ title: 'Error', message: msg, position: 'topRight' });
                } else {
                    alert(msg);
                }
            }
        }).fail(function (xhr) {
            var msg = 'Something went wrong. Please try again.';
            try {
                var j = xhr.responseJSON;
                if (j && j.message) msg = j.message;
            } catch (err) {}
            if (typeof iziToast !== 'undefined') {
                iziToast.error({ title: 'Error', message: msg, position: 'topRight' });
            } else {
                alert(msg);
            }
        }).always(function () {
            $btn.prop('disabled', false);
        });
    });
})(jQuery);
</script>

<div class="modal fade" id="Signup_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content login_modal_header">
        <div class="modal-header" style="border: none;">
          <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body login_modal_body">
            <div class="login_signup_button">
                    <button type="button" class="active2" id="sign_in">Sign In</button>
                    <button type="button" class="" id="sign_up">Sign Up</button>
            </div>
            <div class="signin" id="signin">
            <div class="signin_form" id="">
                <p>EMAIL ID</p>
                <input type="text" id="email_for_login" placeholder="Enter your valid email address">
                <p>PASSWORD</p>
                <input type="password" id="password" placeholder="Enter your password">
            </div>
            <!--<div>
                <img src="<?php echo base_url('assets/images/pleasewait.gif'); ?>">
            </div>-->
            <div class="signin_button">
                <button type="button" id="login-user"> <span id="change_btn_text">SUBMIT</span>
                <span class="loader__dot" style="display:none">.</span><span class="loader__dot" style="display:none">.</span><span class="loader__dot" style="display:none">.</span>
                
                </button>
            </div>
            </div>
            <div class="signup" id="signup">
            <div class="signup_form">
                <p>EMAIL ID</p>
                <input type="text" id="email_of_user" placeholder="Enter your valid email address">
            </div>
            <div class="signup_button">
                <button type="button" id="suer_signup"><span id="change_text_btnn">SUBMIT</span>
                 <span class="loader__dot" style="display:none">.</span><span class="loader__dot" style="display:none">.</span><span class="loader__dot" style="display:none">.</span>
                </button>
            </div>
           </div> 
        </div>
        <div class="modal-footer" style="border: none;">
          </div>
        </div>
    </div>
</div>
            
            
       <div class="modal fade" id="reg_modal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content login_modal_header">
                <div class="modal-header" style="border: none;">
                  <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
                  <center><h2 class="modal-title">Registration Form</h2></center>
                </div>
                <div class="modal-body signup_form" style="margin-top:50px">
                  <p>Name</p>
                  <input type="text" id="name" placeholder="Enter your name">

                  <p>Email</p>
                  <input type="text" id="email" placeholder="Enter your email id">
                  <p>Country</p>
                  <input type="text" id="country" placeholder="Enter your country">
                  <p>State</p>
                  <input type="text" id="state" placeholder="Enter your state">
                  <p>Address</p>
                  <input type="text" id="address" placeholder="Enter your address">
                  <p>Pin Code</p>
                  <input type="text" id="pin" placeholder="Enter your pin code">
                  <p>Contact No.</p>
                  <input type="text" id="phone" placeholder="Enter your phone no.">
                  <p>Alternative contact</p>
                  <input type="text" id="a_phone" placeholder="Enter your alternative phone no.">
                  <p>Highest Qualification</p>
                  <input type="text" id="qual" placeholder="Enter your qualification">
                  <p>Are you an experienced writer?</p>
                  <input type="radio" name="exp" value="Yes" checked>Yes
                  <input type="radio" name="exp" value="No">No
                  <p>Current and/or Previous organization:</p>
                  <input type="text" id="org" placeholder="Enter the name of organization">
                  <p>Your writing speed(words/day):</p>
                  <input type="text" id="typying_speed" placeholder="Enter your typing speed">
                  <p>Availability(full time/part time):</p>
                  <input type="text" id="availablity" placeholder="Availablity">
                  <p>Subject area(Tick on the selected):</p>
                  <input type="checkbox"  name="check" value="Management"  >Management
                  <br>
                  <input type="checkbox" name="check" value="Commerce theory" >Commerce theory(Account Finance)
                  <br>
                  <input type="checkbox" name="check" value="Commerce Calculation" >Commerce calculation(Account Finance)
                  <br>
                  <input type="checkbox" name="check" value="Statistics" >Statistics
                  <br>
                  <input type="checkbox" name="check" value="Economics">Economics
                  <br>
                  <input type="checkbox" name="check" value="Law">Law
                  <br>
                  <input type="checkbox" name="check" value="IT-theory" >IT-theory
                  <br>
                  <input type="checkbox" name="check" value="IT-practical">IT-practical
                  <br>
                  <input type="checkbox" name="check" value="Project management">Project management
                  <br>
                  <input type="checkbox" name="check" value="Science">Science
                  <br>
                  <input type="checkbox" name="check" value="Health">Health
                  <br>
                  <input type="checkbox" name="check" value="English" >English
                </div>
                <div class="modal-footer">
                  <a href="javascript:void('null');"  id="f_signup" class="btn btn-default">SUBMIT</a>
                </div>
              </div>

            </div>
        </div>  
            
            
                 


    <script defer src="<?php echo base_url(); ?>assets/mainjs/userinfo.js"></script>
<?php
$_dcc_dental_lite_js = (strtolower((string) $this->router->fetch_class()) === 'dental');
if (empty($_dcc_dental_lite_js)) {
?>
    <script defer src="<?php echo base_url(); ?>assets/js/Carousel.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/js/lightslider.js"></script>
<?php } ?>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/js/iziToast.min.js"></script>


 