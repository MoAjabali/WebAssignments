<h2>قائمة الطلبات</h2>
<table>
    <thead>
        <tr>
            <th>رقم الطلب</th>
            <th>التاريخ</th>
            <th>الحالة</th>
            <th>المبلغ الإجمالي</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td>#<?php echo $order->orderId; ?></td>
            <td><?php echo $order->orderDate; ?></td>
            <td><?php echo $order->status; ?></td>
            <td><strong><?php echo $order->getTotalAmount(); ?> ر.س</strong></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
