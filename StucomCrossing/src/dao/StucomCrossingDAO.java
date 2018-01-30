/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLDataException;
import java.sql.SQLException;
import java.sql.Statement;
import modelo.User;
import modelo.Character;

/**
 *
 * @author serra
 */
public class StucomCrossingDAO {

    private Connection conexion;

    //CONECTAR/DESCONECTAR
    
    public void conectar() throws SQLException {

        String url = "jdbc:mysql://localhost:3306/stucomcrossing";
        String user = "root";
        String pass = "";
        conexion = DriverManager.getConnection(url, user, pass);

    }

    public void desconectar() throws SQLException {

        if (conexion != null) {
            conexion.close();
        }
    }

    public void insertarUser(User u) throws SQLException{
    
    
    
     if (existeUser(u)) {
            throw new SQLException("ERROR: Ya existe un usuario con ese nombre");
        } else {
            // Definimos la consulta
            String insert = "insert into user values (?, ?, ?, ?, ?, ?)";
            // Necesitamos preparar la consulta parametrizada
            PreparedStatement ps = conexion.prepareStatement(insert);
            // Le damos valor a los interrogantes
            ps.setString(1, u.getUsername());
            ps.setString(2, u.getPassword());
            ps.setInt(3, u.getStucoins());
            ps.setInt(4, u.getLevel());
            ps.setString(5, u.getPlace());
            ps.setInt(6, u.getPoints());
            // Ejecutamos la consulta
            ps.executeUpdate();
            // cerramos recursos
            ps.close();
       }
    }
    public void insertarCharacter(Character c) throws SQLException{
    
    
    
     if (existeCharacter(c)) {
            throw new SQLException("ERROR: Ya existe un personaje con ese nombre");
        } else {
            // Definimos la consulta
            String insert = "insert into character values (?, ?, ?, ?)";
            // Necesitamos preparar la consulta parametrizada
            PreparedStatement ps = conexion.prepareStatement(insert);
            // Le damos valor a los interrogantes
            ps.setString(1, c.getName());
            ps.setString(2, c.getStudy());
            ps.setString(3, c.getPlace());
            ps.setString(4, c.getPreference());
            
            // Ejecutamos la consulta
            ps.executeUpdate();
            // cerramos recursos
            ps.close();
       }
    }
    
    private boolean existeUser(User u) throws SQLException{
        String select = "select*from user where username='" + u.getUsername() + "'";
        Statement st=conexion.createStatement();
        boolean existe =false;
        ResultSet rs = st.executeQuery(select);
        if(rs.next()){
        existe=true;
        }
        rs.close();
        st.close();
        return existe;
}
    private boolean existeCharacter(Character c) throws SQLException{
        String select = "select*from character where name='" + c.getName() + "'";
        Statement st=conexion.createStatement();
        boolean existe =false;
        ResultSet rs = st.executeQuery(select);
        if(rs.next()){
        existe=true;
        }
        rs.close();
        st.close();
        return existe;
}
  // Función que devuelve un User a partir del nombre
    public User getUserByNombre(String username) throws  SQLException {
        User aux = new User(username);
        if (!existeUser(aux)) {
            throw new SQLDataException("ERROR: No existe ningún user con ese nombre");
        }
        String select = "select * from user where username='" + username + "'";
        Statement st = conexion.createStatement();
        ResultSet rs = st.executeQuery(select);
        User c = new User();
        if (rs.next()) {
            c.setUsername(rs.getString("username"));
            c.setPassword(rs.getString("password"));
            c.setStucoins(rs.getInt("stucoins"));
            c.setLevel(rs.getInt("level"));
            c.setPlace(rs.getString("place"));
            c.setPoints(rs.getInt("points"));
        }
        rs.close();
        st.close();
        return c;
    }   
}
