/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package stucomcrossing;

import dao.StucomCrossingDAO;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import modelo.User;

/**
 *
 * @author serra
 */
public class StucomCrossing {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        StucomCrossingDAO stucomcrossingDAO = new StucomCrossingDAO();
        User u1 = new User("Giannis", "1234", 100, 0, "Dmc", 0);
        User u2 = new User("Giannis", "1234", 100, 0, "DmMC", 0);

        System.out.println("************************************************************");
        System.out.println("Testeando conexión con la base de datos...");
        try {
            stucomcrossingDAO.conectar();
            System.out.println("Establecida la conexión.");
             System.out.println("************************************************************");
            System.out.println("Testeando insert USER " + u1.getUsername());
            altaUser(stucomcrossingDAO, u1);
            System.out.println("Testeando insert USER " + u2.getUsername());
            altaUser(stucomcrossingDAO, u2);
            System.out.println("Testeando obtener USER por nombre " + u2.getUsername());
            obtenerUser(stucomcrossingDAO, "giannis");
            
            
        } catch (Exception e) {

        }
    }
 private static void altaUser(StucomCrossingDAO stucomcrossingDAO, User u1) throws SQLException {
        try {
            stucomcrossingDAO.insertarUser(u1);
            System.out.println("User dado de alta");
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
    }
 
  private static void obtenerUser(StucomCrossingDAO stucomcrossingDAO, String username) throws SQLException {
        try {
            User aux = stucomcrossingDAO.getUserByNombre(username);
            System.out.println("Datos del plato");
            System.out.println(aux);
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
    }
    }

