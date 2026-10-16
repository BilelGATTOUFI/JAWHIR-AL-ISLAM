<div class="container" style="padding: 40px 0;">
    <h1 style="margin-bottom: 30px; text-align: center;">مجلة جوهر الإسلام</h1>
    
    <div class="row">
        <?php if (!empty($arguments["magazines"])): ?>
            <?php foreach ($arguments["magazines"] as $magazine): ?>
                <div class="col-md-4" style="margin-bottom: 30px; text-align: center;">
                    <div class="card" style="border: 1px solid #ddd; padding: 15px; border-radius: 8px;">
                        <?php if (!empty($magazine->magazine_cover)): ?>
                            <img src="upload/magazines/<?php echo $magazine->magazine_cover; ?>" alt="<?php echo $magazine->magazine_title; ?>" style="max-width: 100%; height: 250px; object-fit: cover; border-radius: 4px;">
                        <?php endif; ?>
                        
                        <h3 style="margin-top: 15px; font-size: 18px;"><?php echo $magazine->magazine_title; ?></h3>
                        <p style="color: #666; font-size: 14px;"><?php echo $magazine->magazine_date; ?></p>
                        
                        <?php if (!empty($magazine->magazine_pdf)): ?>
                            <a href="upload/magazines/<?php echo $magazine->magazine_pdf; ?>" target="_blank" class="btn btn-primary" style="display: inline-block; padding: 8px 15px; background: #007bff; color: #fff; text-decoration: none; border-radius: 4px; margin-top: 10px;">تحميل العدد (PDF)</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; width: 100%;">لا توجد إصدارات منشورة حالياً في المجلة.</p>
        <?php endif; ?>
    </div>
</div>