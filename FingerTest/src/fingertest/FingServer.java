
package fingertest;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.io.Reader;
import java.net.ServerSocket;
import java.net.Socket;
import java.net.URLDecoder;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.net.ssl.SSLServerSocket;
import org.omg.PortableInterceptor.ClientRequestInfo;

/**
 *
 * @author gts
 */
public class FingServer {
 
    int portno=8078;
   String server="localhost";
   
   
   void startServer() throws IOException{
       ServerSocket server = new ServerSocket(portno);
       Socket client;
       System.out.println("Server Started");
       while(true){
           try{
               System.out.println("Waiting for client");
           client = server.accept();
           System.out.println("Connected to client");
           branchClient(client);
           }catch(Exception e){
               e.printStackTrace();
           }
           
       }
       
     
   }
   
   
   String getHeader( String result){
       String head ="HTTP/1.1 200 OK\r\n"+
	"Date: Wed, 20 Dec 2017 06:47:51 GMT\r\n"+
	"Server: Apache/2.4.27 (Win32) OpenSSL/1.0.2l PHP/7.1.8\r\n"+
	"Last-Modified: Mon, 27 Nov 2017 09:02:54 GMT\r\n"+
	"Content-Length:"+(result.length()+2)+" \r\n"+
	"Keep-Alive: timeout=5, max=100\r\n"+
	"Connection: Keep-Alive\r\n"+
	"Content-Type: text/html\r\n\r\n";
       return head;
   }
   void branchClient(Socket client) throws IOException{
       try{
            HashMap<String, String> query; 
       System.out.println("Inside Client branch");
       BufferedReader clientReader = new BufferedReader(new InputStreamReader(client.getInputStream()));
       PrintWriter out= new PrintWriter(client.getOutputStream());
       StringBuffer  sb = new StringBuffer();
       String line="";
       while((line=clientReader.readLine()).length()!=0){
           System.out.println("Line "+line);
           sb.append(line);
       }
       char buf[] =new char[500];
       int l =clientReader.read(buf);
       String result="";
       String input=new String(buf);
           System.out.println("data "+input + " l = "+l);
         query = parseQuery(input);
//           if(input.contains("register")){
//               System.out.println("inside ");
//              result = ""+FingerTest.checkDuplicate();
//               System.out.println("RES "+result);
//           }
System.out.println("asd "+query);  
  String type=query.get("type").trim();
  
           System.out.println("sss "+type+"| "+type.length());
if(type.equalsIgnoreCase("register")){
                 System.out.println("inside ");
              result = ""+FingerTest.checkDuplicate();
               System.out.println("dup RES "+result);
        }
         
        if(type.equalsIgnoreCase("verify")){
            String file1,file2;
            file1=query.get("file1");
             file2=query.get("file2");
            file1= URLDecoder.decode(file1, "UTF-8");
            file2= URLDecoder.decode(file2, "UTF-8");
            
           
            System.out.println("FILE "+file1+"  "+file2);
             result = ""+FingerTest.verifyFP(file1, file2);
               System.out.println("veridy RES "+result);
        }
               
       System.out.println("Reading client "+sb.toString());
       //String result ="Hello OK";
       out.print(getHeader(result));
       out.print(result);
       //out.println();
       out.close();
       clientReader.close();
       }catch(Exception e){
           e.printStackTrace();
       }
   }
    
   
    HashMap<String, String> parseQuery(String query){
        HashMap<String, String> result = new HashMap<>();
        String ss[]=query.split("&");
        String kval[];
        for(int i=0;i<ss.length;i++){
            kval=ss[i].split("=");
            result.put(kval[0],kval[1]);
        }
        
        return result;
    }
   
   public static void main(String arg[]){
       FingServer fs =  new FingServer();
       
        try {
            fs.startServer();
        } catch (IOException ex) {
            ex.printStackTrace();
        }
       
   }
    
}
