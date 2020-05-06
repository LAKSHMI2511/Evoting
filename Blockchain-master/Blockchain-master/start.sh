rem #mvn clean install -DskipTests=true
rem #mvn clean install
mvn -D"maven.repo.local"=./libs clean install 

java -jar ./target/Blockchain-0.0.1-SNAPSHOT.jar

