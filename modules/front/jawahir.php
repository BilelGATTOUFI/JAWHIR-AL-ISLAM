

<?php
// استدعاء الهيدر والقائمة العلوية
include("theme/front/head.inc.php");
include("theme/front/topnav.inc.php");
?>

<div class="container" dir="rtl" style="margin-top: 30px; margin-bottom: 50px; text-align: right;">
    <div class="row">
        <div class="col-md-12">
            <h2 style="border-bottom: 2px solid #0088cc; padding-bottom: 10px; margin-bottom: 30px; font-weight: bold;">
                <i class="fa fa-book"></i> أعداد مجلة جوهر الإسلام
            </h2>
        </div>
    </div>

    <div class="row">
        <?php
        // جلب أعداد المجلة من قاعدة البيانات (ترتيب تنازلي حسب الأحدث)
        // يمكنك تعديل اسم الجدول والـ Model حسب هيكلة مشروعك
        $query = "SELECT * FROM jawahir_issues ORDER BY id DESC";
        $issues = db::query($query); // أو استخدام الـ Controller الخاص بك

        if ($issues && count($issues) > 0) {
            foreach ($issues as $issue) {
                ?>
                <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                    <div class="panel panel-default" style="border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <div class="panel-body" style="text-align: center;">
                            <!-- غلاف العدد -->
                            <img src="upload/jawahir/<?php echo htmlspecialchars($issue['cover_image']); ?>" alt="<?php echo htmlspecialchars($issue['title']); ?>" style="width: 100%; height: 320px; object-fit: cover; border-radius: 5px; margin-bottom: 15px;">
                            
                            <!-- عنوان العدد -->
                            <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px; color: #333;">
                                <?php echo htmlspecialchars($issue['title']); ?>
                            </h3>
                            
                            <!-- وصف أو تاريخ الإصدار -->
                            <p style="color: #666; font-size: 14px; margin-bottom: 15px;">
                                <?php echo htmlspecialchars($issue['description']); ?>
                            </p>
                            
                            <!-- أزرار التصفح والتحميل -->
                            <div style="display: flex; gap: 10px; justify-content: center;">
                                <a href="upload/jawahir/<?php echo htmlspecialchars($issue['pdf_file']); ?>" target="_blank" class="btn btn-primary btn-sm" style="flex: 1;">
                                    <i class="fa fa-eye"></i> تصفح PDF
                                </a>
                                <a href="upload/jawahir/<?php echo htmlspecialchars($issue['pdf_file']); ?>" download class="btn btn-success btn-sm" style="flex: 1;">
                                    <i class="fa fa-download"></i> تحميل
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="col-md-12"><div class="alert alert-info text-center">لا توجد أعداد منشورة حالياً في مجلة جوهر الإسلام. ترقبونا قريباً!</div></div>';
        }
        ?>
    </div>
</div>

<?php
// استدعاء الفوتر
include("theme/front/footer.inc.php");
?>