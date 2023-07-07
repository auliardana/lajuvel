const express = require('express');
const registerApi = require('./register');
const loginApi = require('./login');
const paymentApi = require('./payment');
const productApi = require('./product');
// const orderApi = require('./order');


const router = express.Router();

router.use(registerApi);
router.use(loginApi);
router.use(paymentApi);
router.use(productApi);
// router.use(orderApi);

module.exports = router;
