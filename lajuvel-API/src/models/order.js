const { DataTypes, Model } = require('sequelize');
const sequelize = require('../database');
const User = require('./user');

class Order extends Model {}

Order.init(
  {
    order_id: {
      type: DataTypes.INTEGER,
      primaryKey: true,
      autoIncrement: true,
    },
    user_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      references: {
        model: User,
        key: 'id',
      },
    },
    tanggal_pesanan: {
      type: DataTypes.DATEONLY,
      allowNull: false,
    },
    total_jumlah: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    status: {
      type: DataTypes.STRING,
      allowNull: false,
    },
  },
  {
    sequelize,
    modelName: 'Order',
    tableName: 'orders',
    timestamps: true,
  }
);

// Definisi relasi
Order.belongsTo(User, {
  foreignKey: 'user_id',
  as: 'user',
});

module.exports = Order;