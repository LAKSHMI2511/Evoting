rem #mvn clean install -DskipTests=true
rem mvn clean install
mvn -D"maven.repo.local"=e:\caf\Blockchain-master\blockchain-master\libs -DskipTests=true clean install
rem java -jar ./target/Blockchain-0.0.1-SNAPSHOT.jar

