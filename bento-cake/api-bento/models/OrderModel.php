<?php
class OrderModel {
    private $file = __DIR__ . "/../data.json";

    public function getAll() {
        if (!file_exists($this->file)) {
            return [];
        }
        $data = file_get_contents($this->file);
        return json_decode($data, true) ?? [];
    }

    public function save($order) {
        $data = $this->getAll();
        $order['id'] = uniqid("order_");
        $data[] = $order;
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
        return $order;
    }
}
?>
