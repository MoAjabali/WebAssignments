<h2>قائمة العملاء</h2>
<div class="actions-bar">
    <a href="index.php?page=add_customer" class="btn">إضافة عميل جديد</a>
</div>
<table>
    <thead>
        <tr>
            <th>الاسم</th>
            <th>البريد الإلكتروني</th>
            <th>تاريخ التسجيل</th>
            <th>مدة العضوية</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?php echo $customer->name; ?></td>
            <td><?php echo $customer->email; ?></td>
            <td><?php echo $customer->registrationDate; ?></td>
            <td><?php echo $customer->getMembershipDuration(); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
