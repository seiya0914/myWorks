import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import java.awt.FlowLayout;
import javax.swing.JTextField;
import java.awt.Color;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.Set;

import javax.swing.JLabel;
import javax.swing.JButton;
import javax.swing.border.SoftBevelBorder;
import javax.swing.border.BevelBorder;
import javax.swing.border.CompoundBorder;
import javax.swing.border.EtchedBorder;

public class LoginScreen extends JFrame {

	private JPanel contentPane;
	private JTextField txtPwd;
	private JTextField txtEmail;
	private JLabel lblEmail;
	private JLabel lblPassword;
	private JPanel panel;
	
	private static String email;
	private static String pwd;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					LoginScreen frame = new LoginScreen();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
		
		
	}

	/**
	 * Create the frame.
	 */
	public LoginScreen() {
		
		
		setResizable(false);
		setFont(new Font("Agency FB", Font.PLAIN, 12));
		setTitle("DatabaseGUI\r\n");
		setBackground(new Color(0, 0, 0));
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 645, 202);
		contentPane = new JPanel();
		contentPane.setBackground(new Color(255, 255, 255));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JButton btnLogin = new JButton("LOG IN");
		btnLogin.setBounds(274, 142, 91, 21);
		contentPane.add(btnLogin);
		
		panel = new JPanel();
		panel.setBorder(new EtchedBorder(EtchedBorder.RAISED, null, null));
		panel.setBounds(156, 27, 326, 104);
		contentPane.add(panel);
		panel.setLayout(null);
		
		lblEmail = new JLabel("Email");
		lblEmail.setBounds(12, 23, 50, 13);
		panel.add(lblEmail);
		
		lblPassword = new JLabel("Password");
		lblPassword.setBounds(12, 63, 74, 13);
		panel.add(lblPassword);
		
		txtEmail = new JTextField();
		txtEmail.setBounds(117, 15, 172, 30);
		panel.add(txtEmail);
		txtEmail.setColumns(10);
		
		txtPwd = new JTextField();
		txtPwd.setBounds(117, 55, 172, 30);
		panel.add(txtPwd);
		txtPwd.setColumns(10);
		
		
		//then connect to the database to get the particular record and authenticate the user
		btnLogin.addActionListener(new ActionListener(){
			@Override
			public void actionPerformed(ActionEvent arg0) {
				//get values from input boxes
				email = txtEmail.getText().toString();
				
				pwd = txtPwd.getText().toString();
				
				auth(email,pwd);
			}
		});
	}
	
	public void auth(String em, String p){
		try{
			Class.forName("com.mysql.jdbc.Driver");  
			
			Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/example","root","root");
			
			Statement stmt = con.createStatement();
			
			ResultSet rs = stmt.executeQuery("select * from users where email = '" + em + "';");
			
			while(rs.next()){
				if(rs.getString(3).toString().equals(p)){
					lbl.setText("Logged in!!");
				}
			}
			con.close();
		}
		catch(Exception e){
			lbl.setText(e.getMessage());
		}
	}
}
