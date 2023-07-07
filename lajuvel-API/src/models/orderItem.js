const { DataTypes, Model } = require('sequelize');
const sequelize = require('../database');
const Order = require('./order');
const Product = require('./product');

class OrderItem extends Model {}

OrderItem.init(
  {
    order_item_id: {
      type: DataTypes.INTEGER,
      primaryKey: true,
      autoIncrement: true,
    },
    order_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      references: {
        model: Order,
        key: 'order_id',
      },
    },
    product_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      references: {
        model: Product,
        key: 'product_id',
      },
    },
    jumlah: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    harga_satuan: {
      type: DataTypes.FLOAT,
      allowNull: false,
    },
  },
  {
    sequelize,
    modelName: 'OrderItem',
    tableName: 'order_items',
    timestamps: false,
  }
);

// Definisi relasi
OrderItem.belongsTo(Order, {
  foreignKey: 'order_id',
  as: 'order',
});
OrderItem.belongsTo(Product, {
  foreignKey: 'product_id',
  as: 'product',
});

module.exports = OrderItem;
