const express = require("express");
const Product = require('../models/product');

const router = express.Router();

// Rute-rute API terkait produk akan ditambahkan di sini

// Mendapatkan daftar semua produk
router.get('/products', async (req, res) => {
    try {
      const products = await Product.findAll();
      res.json(products);
    } catch (error) {
      res.status(500).json({ error: 'Failed to fetch products' });
    }
});

// Membuat produk baru
router.post('/products', async (req, res) => {
    try {
      const { name, category, size, price, stock,link_gambar, description } = req.body;
      const product = await Product.create({ name, category, size, price, stock,link_gambar, description });
      res.status(201).json(product);
    } catch (error) {
      res.status(400).json({ error: 'Failed to create product' });
    }
});

// Memperbarui produk berdasarkan ID
router.put('/products/:id', async (req, res) => {
    try {
      const { id } = req.params;
      const { name, category, size, price, stock, description } = req.body;
      const updatedProduct = await Product.update({ name, category, size, price, stock, description }, {
        where: { id },
      });
      res.json(updatedProduct);
    } catch (error) {
      res.status(400).json({ error: 'Failed to update product' });
    }
});

// Menghapus produk berdasarkan ID
router.delete('/products/:id', async (req, res) => {
    try {
      const { id } = req.params;
      await Product.destroy({ where: { id } });
      res.json({ message: 'Product deleted successfully' });
    } catch (error) {
      res.status(400).json({ error: 'Failed to delete product' });
    }
});

module.exports = router;