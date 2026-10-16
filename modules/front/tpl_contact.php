<section id="title" class="emerald" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1><?=___("Contact");?></h1>
            </div>
            <div class="col-sm-3">

            </div>

        </div>
    </div>
</section>

<div id="page">
<section id="contact-page" class="container"  dir="rtl">
    <div class="row">

        <div class="col-sm-5">
            <h4>التواصل مع الموقع</h4>
            <div class="status alert alert-success" style="display: none"></div>
            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="#" role="form">
                <div class="row">
                    <div class="col-sm-7">
                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="ذكر الموضوع الذي ترغب بطرحه مفصلا"></textarea>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" placeholder="الاسم">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" placeholder="اللقب">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" placeholder="البريد الالكتروني">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">إرسال</button>
                        </div>
                    </div>

                </div>
            </form>
        </div><!--/.col-sm-5-->
        <div class="col-sm-4">
            <h4>موقعنا</h4>
            <iframe width="100%" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Rue+Jamel+Abdenasser,+Tunis&amp;aq=0&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=13&amp;output=embed"></iframe>
        </div><!--/.col-sm-4-->

        <div class="col-md-3" dir="rtl">
            <?php include("tpl_sidebar.inc.php"); ?>
        </div>

    </div>
</section><!--/#contact-page-->

</div>