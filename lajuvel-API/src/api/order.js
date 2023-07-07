const express = require("express");
const Order = require('../models/order');

const router = express.Router();

// Rute untuk membuat pesanan baru
router.post('/orders', async (req, res) => {
  try {
    const { user_id, total_amount, status } = req.body;
    const order = await Order.create({ user_id, total_amount, status });
    res.status(201).json(order);
  } catch (error) {
    res.status(400).json({ error: 'Failed to create order' });
  }
});

// Rute untuk mendapatkan daftar pesanan
router.get('/orders', async (req, res) => {
  try {
    const orders = await Order.findAll();
    res.json(orders);
  } catch (error) {
    res.status(500).json({ error: 'Failed to fetch orders' });
  }
});

// Rute lainnya untuk operasi CRUD pada "Order"
// Tambahkan rute-rute tambahan di sini

module.exports = router;