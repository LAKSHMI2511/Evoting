/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package fingertest;
import com.machinezoo.sourceafis.*  ;
import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.ObjectOutputStream;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.Date;
/**
 *
 * @author gts
 */
public class FingerTest {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try{
            
            checkDuplicate();
            long start =new Date().getTime();
            System.err.println("start "+start);
            byte[] probeImage = Files.readAllBytes(Paths.get("finger2.bmp"));
byte[] candidateImage = Files.readAllBytes(Paths.get("foo.png"));
FingerprintTemplate probe = new FingerprintTemplate(probeImage);

FingerprintTemplate candidate = new FingerprintTemplate(candidateImage);

FingerprintMatcher matcher = new FingerprintMatcher(probe);
         //   ByteArrayOutputStream bos = new ByteArrayOutputStream();
         //   ObjectOutputStream oos = new ObjectOutputStream(bos);
         //   oos.writeObject(candidate);
          //  System.out.println("SIZE "+bos.toByteArray().length);

double score = matcher.match(candidate);
boolean match = score >= 40;
            System.out.println("SCORE "+score);
            System.out.println("Match "+match);
            long end=new Date().getTime();
System.err.println("End "+end);            
System.err.println("Timne "+(end-start));            
        }catch(Exception e){
            e.printStackTrace();
        }
    }
     public static String verifyFP(String file1,String file2) {
         String result="false";
             boolean match=false;
             try{
                 File f = new File(file1);
                 String name = f.getName();
                // String fileTemp = "C:\\xampp\\htdocs\\An_OnlineVotingQR\\fpimages\\"+name;
                 //String fileTemp1 = "C:\\xampp\\htdocs\\An_OnlineVotingQR\\temp\\foo.png";
                 System.out.println("----Found name----"+name);
          byte[] probeImage = Files.readAllBytes(Paths.get(file1));
                byte[] candidateImage = Files.readAllBytes(Paths.get(file2));
                FingerprintTemplate probe = new FingerprintTemplate(probeImage);

                FingerprintTemplate candidate = new FingerprintTemplate(candidateImage);

                FingerprintMatcher matcher = new FingerprintMatcher(probe);
                //   ByteArrayOutputStream bos = new ByteArrayOutputStream();
                //   ObjectOutputStream oos = new ObjectOutputStream(bos);
                //   oos.writeObject(candidate);
                //  System.out.println("SIZE "+bos.toByteArray().length);

                double score = matcher.match(candidate);
                 match = score >= 60;
                  System.out.println("SCORE " + score);
                System.out.println("Match " + match);
                if(match)
                {
                    return ""+match;
                }
             }catch(Exception e){
             e.printStackTrace();
                 return "ERROR:-"+e.getMessage();
             
             }
         return result;
     }
    
    public static boolean checkDuplicate() {
        boolean match=false;
        try {
            File f = new File("E:\\xampp\\htdocs\\BioFing\\register");

            File f1[] = f.listFiles();
            for (File f2 : f1) {
                System.out.println("Searching for "+f2.getAbsolutePath());
  //              byte[] probeImage = Files.readAllBytes(Paths.get(f2.getAbsolutePath()));
//                byte[] candidateImage = Files.readAllBytes(Paths.get("E:\\xampp\\htdocs\\BioFing\\foo.png"));

              byte[] probeImage = Files.readAllBytes(Paths.get("E:\\xampp\\htdocs/An_OnlineVoting/fpimages/1aae048682e9d9d89ab2931c73ced144.png"));
                System.out.println("TEST 1");
                byte[] candidateImage = Files.readAllBytes(Paths.get("E:\\xampp\\htdocs/An_OnlineVoting/temp/foo.png"));
                
                System.out.println("TEST 2");
                FingerprintTemplate probe = new FingerprintTemplate(probeImage);

                FingerprintTemplate candidate = new FingerprintTemplate(candidateImage);

                FingerprintMatcher matcher = new FingerprintMatcher(probe);
                //   ByteArrayOutputStream bos = new ByteArrayOutputStream();
                //   ObjectOutputStream oos = new ObjectOutputStream(bos);
                //   oos.writeObject(candidate);
                //  System.out.println("SIZE "+bos.toByteArray().length);

                double score = matcher.match(candidate);
                 match = score >= 60;
                  System.out.println("SCORE " + score);
                System.out.println("Match " + match);
                if(match)
                {
                    return match;
                }
               
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return false;
    }
}
