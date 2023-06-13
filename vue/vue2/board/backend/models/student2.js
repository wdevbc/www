module.exports = (sequelize, DataTypes) => {
    return sequelize.define('student2', {
        name: {
            type: DataTypes.STRING(30),
            allowNull: false,
        },
        age: {
            type: DataTypes.INTEGER,
            allowNull: false,
        },
        height: {
            type: DataTypes.DOUBLE,
            allowNull: false,
        },
    },{
        charset: 'utf8',
        collate: 'utf8_general_ci',        // 이걸 해줌으로써 DB에 한글사용 가능
    });
}